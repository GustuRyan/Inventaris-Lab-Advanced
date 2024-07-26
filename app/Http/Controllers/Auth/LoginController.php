<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index($auth) 
    {
        return view('user.pages.auth', compact('auth'));
    }

    public function login(Request $request)
    {
        $loginWith = filter_var($request->credential, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        
        if ($loginWith == 'email') {
            $request->validate([
                'credential' => ['required', 'email'],
                'password' => ['required']
            ]);

            if (Auth::attempt(['email' => $request->credential, 'password' => $request->password])) {
                $request->session()->regenerate();

                return redirect()->intended(route('dashboard'));
            }

            return redirect()->route('authentication', 'login')->withErrors([
                'credential' => 'Anda memasukan email dan password yang salah atau belum terdaftar!',
            ])->onlyInput('credential');
        } else {
            $request->validate([
                'credential' => ['required'],
                'password' => ['required']
            ]);

            if (Auth::attempt(['username' => $request->credential, 'password' => $request->password])) {
                $request->session()->regenerate();

                return redirect()->intended(route('dashboard'));
            }

            return redirect()->route('authentication', 'login')->withErrors([
                'credential' => 'Anda memasukan username dan password yang salah atau belum terdaftar!',
            ])->onlyInput('credential');
        }
    }
}
