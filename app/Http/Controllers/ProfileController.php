<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Publisher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index(Request $request, $login = null)
    {
        $account = Auth::user();
        $isOwner = $account->login == ($login ?: $account->login);
        if ($account && $isOwner) {
            if (!$account->profile()->exists()) {
                if ($account->is_publisher) {
                    return view('profile.publisher.create');
                } else {
                    return view('profile.user.create');
                }
            }
            $accData = [
                'account' => $account,
                'profile' => $account->profile,
            ];
        } else {
            $accData = Account::getAccountDataByLogin($login);
        }

        if ($accData['account']->is_publisher) {
            return view('profile.publisher.index', $accData);
        } else {
            return view('profile.user.index', $accData);
        }
    }

    public function create_post(Request $request)
    {
        $account = Auth::user();
        if ($account->is_publisher) {
            Validator::validate($request->all(), [
                'name' => 'required|min:4|max:100',
                'about' => 'nullable|max:2000',
            ], [], [
                'name' => 'Название издательства',
                'about' => 'Об издательстве',
            ]);

            $publisher = new Publisher($request->all());
            $publisher->account()->associate($account);
            $publisher->save();
        } else {
            Validator::validate($request->all(), [
                'name' => 'nullable|min:2|max:100',
                'surname' => 'nullable|min:2|max:100',
                'about' => 'nullable|max:2000',
            ], [], [
                'name' => 'Имя',
                'surname' => 'Фамилия',
                'about' => 'Обо мне',
            ]);

            $user = new User($request->all());
            $user->account()->associate($account);
            $user->save();
        }
        return redirect()->route('profile')
            ->with('success', 'Профиль успешно сохранён!');
    }

    public function edit()
    {

    }

    public function edit_put()
    {

    }
}
