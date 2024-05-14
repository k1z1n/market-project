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
        $data = $request->validate([
            'email' => 'required|email',
        ]);
        $cuc = Cookie::make('email', $data['email'], 10);

        Cookie::queue($cuc);
        $user = Developer::updateOrCreate([
            'email' => $data['email'],
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

        $this->emailService->sendEmail($data['email'], $code);

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
            Auth::guard('developer')->login($developer);
            auth('developer')->login($developer);
            Cookie::queue(Cookie::forget('email'));
            return redirect()->route('developer.profile')->with('message', 'Авторизация успешна');
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
        ]);
        $dataApp = $request->validate([
            'version' => 'required',
            'note' => 'required',
            'version_file' => 'required|file',
        ]);
        if ($request->hasFile('logo_image')) {
            $imageName = time() . '_' . $request->logo_image->getClientOriginalName();
            $request->logo_image->storeAs('application-logo', $imageName);
            $data['logo_image'] = $imageName;
        } else {
            return back()->with('error', 'Логотип не загружен');
        }
        if ($request->hasFile('banner_image')) {
            $bannerName = time() . '_' . $request->banner_image->getClientOriginalName();
            $request->banner_image->storeAs('application-banner', $bannerName);
            $data['banner_image'] = $bannerName;
        } else {
            return back()->with('error', 'Баннер не загружен');
        }
        $data['developer_id'] = auth('developer')->id();
        $app = Application::create($data);

        if ($request->hasFile('version_file')) {
            $versionName = time() . '_' . $request->version_file->getClientOriginalName();
            $request->version_file->storeAs('version', $versionName);
        } else {
            return back()->with('error', 'Приложение не загружено');
        }
        $file = $request->file('version_file');
        $dataApp['size'] = $file->getSize();
        $dataApp['application_id'] = $app->id;
        $dataApp['file_path'] = $versionName;
        VersionApplication::create($dataApp);
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
            'version' => 'required|string|unique:version_applications,version',
            'note' => 'nullable|string',
            'file' => 'required|file',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $versionName = time() . '_' . $file->getClientOriginalName();
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
    public function oneDeveloperView($id){
        $developer = Developer::findOrFail($id);
        $applications = Application::where('developer_id', $developer->id)->get();
        $countApplications=$applications->count();
        return view('developer', compact('applications', 'developer', 'countApplications'));
    }
}
