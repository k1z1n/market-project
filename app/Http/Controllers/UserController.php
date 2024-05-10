<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use App\Models\DeveloperVerificationToken;
use App\Models\User;
use App\Models\UserVerificationToken;
use App\Services\EmailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
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
        $data = $request->validate([
            'email' => 'required|email',
        ]);
        $cuc = Cookie::make('email', $data['email'], 10);

        Cookie::queue($cuc);
        $user = User::updateOrCreate([
            'email' => $data['email'],
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
        $this->emailService->sendEmail($data['email'], $code);

        return redirect()->route('user.code');
    }

    public function codeView(Request $request)
    {
        if ($request->hasCookie('email')) {
            $email = $request->cookie('email');
            return view('code', compact('email'));
        } else {
            return redirect()->route('user.login')->with('message', 'истекло время ввода кода');
        }
    }

    public function verify(Request $request)
    {
        $data = $request->validate([
            'verificationCode' => 'required|numeric|max:9999',
        ]);

        $email = Cookie::get('email');
        $id = User::where('email', $email)->pluck('id')->first();

        $token = UserVerificationToken::where('user_id', $id)
            ->where('token', $data['verificationCode'])
            ->where('expires_at', '>=', now())
            ->first();

        if ($token) {
            $user = User::where('id', $id)->first();
            auth()->login($user);
            Cookie::queue(Cookie::forget('email'));
            return redirect()->route('profile')->with('message', 'Авторизация успешна');
        }
        return redirect()->back()->withErrors([
            'code' => 'Неверный код'
        ]);
    }

    public function logout()
    {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('main');
    }
}
