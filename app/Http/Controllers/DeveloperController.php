<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Category;
use App\Models\Developer;
use App\Models\DeveloperVerificationToken;
use App\Models\Image;
use App\Models\Type;
use App\Models\User;
use App\Models\VersionApplication;
use App\Services\EmailService;
use Carbon\Carbon;
use Coduo\PHPHumanizer\NumberHumanizer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DeveloperController extends Controller
{
    protected EmailService $emailService;

    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    public function developerLoginView(Request $request)
    {
        $email = $request->cookie('email');
        return view('login-developer', compact('email'));
    }

    public function developerLogin(Request $request)
    {
        $email = $request->input('email');
        $cuc = Cookie::make('email', $email, 10);

        Cookie::queue($cuc);
        $user = Developer::firstOrCreate([
            'email' => $email,
        ]);
        $code = Str::padLeft(rand(0, 9999), 4, '0');
        DeveloperVerificationToken::updateOrCreate(
            [
                'developer_id' => $user->id,
            ],
            [
                'token' => $code,
                'sent_at' => now(),
                'expires_at' => now()->addMinutes(10),
            ]
        );

        $this->emailService->sendEmail($email, $code);

        return redirect()->route('developer.code');
    }

    public function developerCodeView(Request $request)
    {
        if ($request->hasCookie('email')) {
            $email = $request->cookie('email');
            return view('code-developer', compact('email'));
        } else {
            return redirect()->route('developer.login')->with('error', 'истекло время ввода кода');
        }
    }

    public function developerVerify(Request $request)
    {
        $data = $request->validate([
            'verificationCode' => 'required|numeric|max:9999',
        ]);

        $email = Cookie::get('email');
        $id = Developer::where('email', $email)->pluck('id')->first();

        $token = DeveloperVerificationToken::where('developer_id', $id)
            ->where('token', $data['verificationCode'])
            ->where('expires_at', '>=', now())
            ->first();
        if ($token) {
            $developer = Developer::where('id', $id)->first();
            $developer->confirmation = 'Подтвержден';
            $developer->save();
            Cookie::queue(Cookie::forget('email'));
            return redirect()->route('developer.profile')->with('message', 'Успешно подтвержден');
        }
        return redirect()->back()->withErrors([
            'code' => 'Неверный код'
        ]);
    }

    public function updateUsername(Request $request)
    {
        if (empty($request->input('username'))) {
            return back()->with('error', 'Поле имени не заполнено');
        }
        $data = [
            'username' => $request->input('username'),
        ];
        $developer = Developer::where('id', auth('developer')->id())->first();
        $developer->update($data);
        return redirect()->route('developer.profile')->with('message', 'Имя пользователя успешно обновлено');
    }

    public function logout()
    {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('main');
    }

    public function developerProfileView()
    {
        $date = Carbon::parse(auth('developer')->user()->created_at)->translatedFormat('d F Y');
        $applications = Application::where('developer_id', auth('developer')->id())->get();
        $total = $applications->count();
        return view('developer.profile', compact('date', 'applications', 'total'));
    }

//    Изменение и создание приложения
    public function addApplicationView()
    {
        if (!isset(auth('developer')->user()->username)) {
            return back()->with('error', 'имя разработчика не указано');
        }
        $types = Type::all();
        $categories = Category::all();
        return view('developer.add', compact('types', 'categories'));
    }

    public function addApplicationStore(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'age' => 'required|integer',
            'description' => 'required|string',
            'type_id' => 'required|exists:types,id',
            'category_id' => 'required|exists:categories,id',
            'logo_image' => 'required|image',
            'banner_image' => 'required|image',
            'version' => 'required|numeric|max:255',
            'note' => 'required|string',
            'app' => 'required|file|mimes:zip'
        ]);

        // Обработка логотипа
        if ($request->hasFile('logo_image')) {
            $imageName = time() . '_' . $request->logo_image->getClientOriginalName();
            $request->logo_image->storeAs('application-logo', $imageName);
            $data['logo_image'] = $imageName;
        } else {
            return back()->with('error', 'Логотип не загружен');
        }

        // Обработка баннера
        if ($request->hasFile('banner_image')) {
            $bannerName = time() . '_' . $request->banner_image->getClientOriginalName();
            $request->banner_image->storeAs('application-banner', $bannerName);
            $data['banner_image'] = $bannerName;
        } else {
            return back()->with('error', 'Баннер не загружен');
        }

        // Сохранение данных приложения
        $data['developer_id'] = auth('developer')->id();
        $app = Application::create($data);

        // Обработка файла версии
        if ($request->hasFile('app')) {
            $originalName = pathinfo($request->app->getClientOriginalName(), PATHINFO_FILENAME);
            $versionName = time() . '_' . $originalName . '.apk';

            $request->app->storeAs('version', $versionName);

            $file = $request->file('app');
            VersionApplication::create([
                'version' => $data['version'],
                'note' => $data['note'],
                'size' => $file->getSize(),
                'application_id' => $app->id,
                'file_path' => $versionName,
            ]);
        } else {
            return back()->with('error', 'Приложение не загружено');
        }

        return redirect()->route('developer.profile')->with('message', 'Приложение успешно добавлено');
    }

    public function editApplicationView($id)
    {
        $types = Type::all();
        $categories = Category::all();
        $application = Application::findOrFail($id);

        $images = Image::where('application_id', $id)->get();

        $versionApplications = VersionApplication::where('application_id', $id)->get();

        foreach ($versionApplications as $versionApplication) {
            $versionApplication->created_at_formatted = Carbon::parse($versionApplication->created_at)->format('d.m.Y');
            $versionApplication->size_formatted = NumberHumanizer::binarySuffix($versionApplication->size);
        }

        return view('developer.update-app', compact('application', 'types', 'categories', 'versionApplications', 'images'));
    }

    public function updateApplicationLogo(Request $request, $id)
    {
        $request->validate([
            'logo_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $imageName = time() . '_' . $request->logo_image->getClientOriginalName();
        $request->logo_image->storeAs('application-logo', $imageName);
        $data['logo_image'] = $imageName;
        $data = [
            'logo_image' => $imageName,
        ];
        $app = Application::findOrFail($id);
        $app->update($data);

        return back()->with('success', 'Логотип успешно обновлен!');
    }

    public function updateApplicationBanner(Request $request, $id)
    {
        $request->validate([
            'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $imageName = time() . '_' . $request->banner_image->getClientOriginalName();
        $request->banner_image->storeAs('application-banner', $imageName);

        $data['banner_image'] = $imageName;

        $app = Application::findOrFail($id);
        $app->update($data);

        return back()->with('success', 'Баннер успешно обновлен!');
    }


    public function updateApplicationAge(Request $request, $id)
    {
        if (empty($request->input('age'))) {
            return back()->with('error', 'Поле возраста не заполнено');
        }
        $data = [
            'age' => $request->input('age'),
        ];
        $application = Application::where('id', $id)->first();
        $application->update($data);
        return redirect()->back()->with('message', 'Возраст успешно обновлен');
    }

    public function updateApplicationTitle(Request $request, $id)
    {
        if (empty($request->input('title'))) {
            return back()->with('error', 'Поле названия не заполнено');
        }
        $data = [
            'title' => $request->input('title'),
        ];
        $application = Application::where('id', $id)->first();
        $application->update($data);
        return redirect()->back()->with('message', 'Возраст успешно обновлен');
    }

    public function updateApplicationDescription(Request $request, $id)
    {
        if (empty($request->input('description'))) {
            return back()->with('error', 'Поле описания не заполнено');
        }
        $data = [
            'description' => $request->input('description'),
        ];
        $application = Application::where('id', $id)->first();
        $application->update($data);
        return redirect()->back()->with('message', 'Описание успешно обновлен');
    }

    public function updateApplicationCategory(Request $request, $id)
    {
        if (empty($request->input('category_id'))) {
            return back()->with('error', 'Поле категории пустое');
        }
        $data = [
            'category_id' => $request->input('category_id'),
        ];
        $application = Application::where('id', $id)->first();
        $application->update($data);
        return redirect()->back()->with('message', 'Категория успешно обновлена');
    }

    public function updateApplicationType(Request $request, $id)
    {
        if (empty($request->input('type_id'))) {
            return back()->with('error', 'Поле категории пустое');
        }
        $data = [
            'type_id' => $request->input('type_id'),
        ];
        $application = Application::where('id', $id)->first();
        $application->update($data);
        return redirect()->back()->with('message', 'Тип успешно обновлен');
    }

    public function updateApplicationPhotos(Request $request, $id)
    {
        $request->validate([
            'images' => 'required',
            'images.*' => 'mimes:jpg,png,jpeg,gif,svg'
        ]);


        $images = Image::where('application_id', $id)->get();
        foreach ($images as $image) {
            File::delete(asset('storage/application-images/`' . $image->title));
            Storage::delete($image->title);
        }
        Image::where('application_id', $id)->delete();

        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $key => $file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('application-images', $fileName);
                $insert[$key]['title'] = $fileName;
                $insert[$key]['application_id'] = $id;
            }
        }
        Image::insert($insert);

        return back()->with('success', 'Фотографии успешно обновлены!');

    }

    public function updateApplicationVersion(Request $request, $id)
    {
        $data = $request->validate([
            'version' => 'required|string',
            'note' => 'required|string',
            'file' => 'required|file|max:307200|mimes:zip',
        ]);
//        if($request->file('file')->getMimeType() !== 'zip'){
//            return back()->with('error', 'Не верный тип даданных')
//        }
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $originalName = pathinfo($request->app->getClientOriginalName(), PATHINFO_FILENAME);
            $versionName = time() . '_' . $originalName . '.apk';
            $file->storeAs('version', $versionName);
            $data['file_path'] = $versionName;
            $data['application_id'] = $id;
            $data['size'] = $request->file('file')->getSize();
            $versionApplication = VersionApplication::create($data);
            if ($versionApplication) {
                return back()->with('success', 'Версия приложения успешно добавлена!');
            } else {
                return back()->with('error', 'Ошибка при создании версии приложения.');
            }
        } else {
            return back()->with('error', 'Приложение не загружено');
        }
    }

//    Показать одного разработчика
    public function oneDeveloperView($id)
    {
        $developer = Developer::findOrFail($id);
        $applications = Application::where('developer_id', $developer->id)->get();
        $countApplications = $applications->count();
        $totalFeedbackCount = $developer->getTotalFeedbackCount();
        $totalDownloadCount = $developer->getTotalDownloadCount();
        return view('developer', compact('applications', 'developer', 'countApplications', 'totalFeedbackCount', 'totalDownloadCount'));
    }


    public function registerDeveloperView()
    {
        return view('developer.register');
    }

    public function registerDeveloper(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|unique:developers',
            'username' => 'required|string|max:20',
            'password' => 'required|min:8',
        ]);
        $data['password'] = Hash::make($data['password']);
        $user = Developer::create($data);
        auth()->logout();
        auth('developer')->login($user);
        return redirect()->route('developer.profile')->with('message', 'Регистрация успешна');
    }

    public function loginDeveloper(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = Developer::where('email', $credentials['email'])->first();

        if ($user && $user->blocked === 'заблокирован') {
            return redirect()->back()->withInput()->with('error', 'Разработчик заблокирован');
        }

        if (auth('developer')->attempt($credentials)) {
            auth()->logout();
            $request->session()->regenerate();
            return redirect()->route('developer.profile')->with('message', 'Авторизация успешна');
        }
        return redirect()->back()->withInput()->with('error', 'Данные не верны');
    }

    public function loginDeveloperView()
    {
        return view('developer.login');
    }
}
