<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Publisher;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index(Request $request, $login = null)
    {
        $account = Auth::user();

        if (is_null($login)) {
            if (!$account) {
                abort(404);
            }
            return redirect()->route('profile', ['login' => $account->login]);
        }

        $isOwner = $account->login == $login;
        if ($account && $isOwner) {
            $accData = $account->getAccountData();
            $redirect = $this->redirectIfNoProfile($account);
            if ($redirect) return $redirect;
        } else {
            $accData = Account::getAccountDataByLogin($login);
        }

        if ($accData['account']->is_publisher) {
            $view = view('profile.publisher.index', $accData);
        } else {
            $view = view('profile.user.index', $accData);
        }

        return $view->with(['isOwner' => $isOwner]);
    }

    public function edit(Request $request)
    {
        $account = Auth::user();
        $accData = $account->getAccountData();

        if ($account->is_publisher) {
            $view = view('profile.publisher.edit');
        } else {
            $view = view('profile.user.edit');
        }

        if (!$account->profile()->exists()) {
            $view->with('info', 'Сперва заполните, пожалуйста, ваш профиль:');
        }

        return $view->with($accData);
    }

    public function edit_post(Request $request)
    {
        $account = Auth::user();
        $hasProfile = $account->profile()->exists();

        if ($account->is_publisher) {
            Validator::validate($request->all(), [
                'name' => 'required|min:4|max:100',
                'about' => 'nullable|max:2000',
            ], [], [
                'name' => 'Название издательства',
                'about' => 'Об издательстве',
            ]);

            if (!$hasProfile){
                $publisher = new Publisher($request->all());
                $publisher->account()->associate($account);
            } else {
                $publisher = $account->publisher;
                $publisher->update($request->all());
            }
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

            if (!$hasProfile){
                $user = new User($request->all());
                $user->account()->associate($account);
            } else {
                $user = $account->user;
                $user->update($request->all());
            }
            $user->save();
        }
        return redirect()->route('profile')
            ->with('success', 'Профиль успешно сохранён!');
    }

    protected function redirectIfNoProfile($account)
    {
        if (!$account->profile()->exists()) {
            return redirect()->route('profile-edit');
        }
        return null;
    }
}
