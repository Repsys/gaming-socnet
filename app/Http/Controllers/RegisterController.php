<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'login' => 'required|min:4|max:100|unique:accounts',
            'email' => 'required|min:3|max:100|email|unique:accounts',
            'password' => 'required|min:8|max:100',
            'confirm_password' => 'required|min:8|max:100|same:password',
        ]);

        $account = new Account($request->all());
        $account->password = bcrypt($request['password']);
        $account->is_publisher = $request->has('is_publisher');
        $account->save();

        return redirect()->route('login')
            ->with('success', 'Аккаунт был успешно создан!');
    }
}
