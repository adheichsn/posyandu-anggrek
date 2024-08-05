<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    protected $redirectTo = '/';

    public function username()
    {
        return 'username';
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showLoginFormAdmin()
    {
        return view('auth.admin_login');
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->role == 'admin') {
            Alert::success('Login Success', 'Selamat datang admin!');
            return redirect()->route('home');
        } else {
            // if ($request->user()->hasVerifiedEmail()) {
            //     Alert::success('Success', 'Berhasil Login !');
            //     return redirect()->route('home');
            // } else {
            //     $request->user()->sendEmailVerificationNotification();
            //     return redirect()->route('verification.notice');
            // }
            Alert::success('Login Success', 'Selamat datang !');
            return redirect()->route('home');
        }
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        Alert::error('Gagal!', 'Username atau Password salah!');
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }

    protected function loggedOut(Request $request)
    {
        Alert::success('Success', 'Berhasil Logout!');
        return redirect()->route('compro');
    }
}
