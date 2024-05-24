<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use App\Models\DeveloperVerificationToken;
use App\Models\User;
use App\Models\UserVerificationToken;
use App\Services\EmailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    protected EmailService $emailService;

    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    public function userLoginView()
    {
        return view('login-user');
    }

    public function userLogin(Request $request){
        $email = $request->input('email');
        $cuc = Cookie::make('email', $email, 10);

        Cookie::queue($cuc);
        $user = User::firstOrCreate([
            'email' => $email,
        ]);
        $code = Str::padLeft(rand(0, 9999), 4, '0');
        UserVerificationToken::updateOrCreate(
            [
                'user_id' => $user->id,
            ],
            [
                'token' => $code,
                'sent_at' => now(),
                'expires_at' => now()->addMinutes(10),
            ]
        );
        $this->emailService->sendEmail($email, $code);

        return redirect()->route('user.code');
    }

    public function verify(Request $request)
    {
        $data = $request->validate([
            'verificationCode' => 'required|numeric|max:9999',
        ]);

        $email = Cookie::get('email');
        $user = User::where('email', $email)->first();

        if (!$user) {
            return redirect()->back()->withErrors([
                'code' => 'Пользователь не найден'
            ]);
        }

        $token = UserVerificationToken::where('user_id', $user->id)
            ->where('token', $data['verificationCode'])
            ->where('expires_at', '>=', now())
            ->first();

        if ($token) {
            $user->confirmation = 'Подтвержен';  // Используйте правильное значение из перечисления
            $user->save();
//            auth()->login($user);
            Cookie::queue(Cookie::forget('email'));
            return redirect()->route('profile')->with('message', 'Успешное подтверждение');
        }
        return redirect()->back()->withErrors([
            'code' => 'Неверный код'
        ]);
    }

    public function codeView(Request $request)
    {
        if ($request->hasCookie('email')) {
            $email = $request->cookie('email');
            return view('code', compact('email'));
        } else {
            return redirect()->route('user.login')->with('error', 'истекло время ввода кода');
        }
    }

//    public function verify(Request $request)
//    {
//        $data = $request->validate([
//            'verificationCode' => 'required|numeric|max:9999',
//        ]);
//
//        $email = Cookie::get('email');
//        $id = User::where('email', $email)->pluck('id')->first();
//
//        $token = UserVerificationToken::where('user_id', $id)
//            ->where('token', $data['verificationCode'])
//            ->where('expires_at', '>=', now())
//            ->first();
//
//        if ($token) {
//            $user = User::where('id', $id)->first();
//            auth()->login($user);
//            Cookie::queue(Cookie::forget('email'));
//            return redirect()->route('profile')->with('message', 'Авторизация успешна');
//        }
//        return redirect()->back()->withErrors([
//            'code' => 'Неверный код'
//        ]);
//    }

    public function logout()
    {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('main');
    }

    public function updateUserName(Request $request)
    {
        if (empty($request->input('username'))) {
            return back()->with('error', 'Поле имени не заполнено');
        }
        $data = [
            'username' => $request->input('username'),
        ];
        $developer = User::where('id', auth('')->id())->first();
        $developer->update($data);
        return redirect()->route('profile')->with('message', 'Имя пользователя успешно обновлено');
    }

    public function registerUserView()
    {
        return view('auth.register');
    }

    public function registerUser(Request $request){
        $data = $request->validate([
            'email' => 'required|email|unique:users',
            'username' => 'required|string|max:20',
            'password' => 'required|min:8',
        ]);
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        auth('developer')->logout();
        auth()->login($user);
        return redirect()->route('profile')->with('message', 'Регистрация успешна');
    }

    public function loginUser(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt($credentials)) {
            auth('developer')->logout();
            $request->session()->regenerate();
            return redirect()->route('profile')->with('message', 'Авторизация успешна');
        }
        return redirect()->back()->with('error', 'Данные не верны');
    }

    public function loginUserView()
    {
        return view('auth.login');
    }
}
