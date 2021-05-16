<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Publisher;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
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
            'email' => 'required|email|max:100|unique:accounts',
            'password' => 'required|min:8|max:100',
            'password_confirmation' => 'required|same:password',
        ]);

        $account = new Account($request->all());
        $account->password = bcrypt($request['password']);
        $account->is_publisher = $request->has('is_publisher');
        $account->save();

        return redirect()->route('login')
            ->with('success', 'Аккаунт был успешно создан!');
    }
}
