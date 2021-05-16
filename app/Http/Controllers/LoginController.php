<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required'
        ]);

        $emailValidator = Validator::make($request->only('login'), [
            'login' => 'email'
        ]);

        $loginField = $emailValidator->passes() ? 'email' : 'login';

        $credentials = [
            $loginField => $request['login'],
            'password' => $request['password']
        ];

        if (!Auth::attempt($credentials)) {
            return redirect()->back()
                ->withInput()
                ->withErrors([
                    'Неверный Логин или Пароль',
                ]);
        }

        $request->session()->regenerate();
        return redirect()->route('profile');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('main')
            ->with('success', 'До скорой встречи!');
    }
}
