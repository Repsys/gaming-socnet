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
    public function index(Request $request, $login = null, $content = null)
    {
        $authAccount = Auth::user();

        if (is_null($login)) {
            if (!$authAccount) {
                abort(404);
            }
            return redirect()->route('profile', ['login' => $authAccount->login]);
        }

        $isOwner = $authAccount && $authAccount->login == $login;
        if ($authAccount && $isOwner) {
            $accData = $authAccount->getAccountData();
            $redirect = $this->redirectIfNoProfile($authAccount);
            if ($redirect) return $redirect;
        } else {
            $accData = Account::getAccountDataByLogin($login);
        }

        $content = $content ?? ($accData['account']->is_publisher ? 'projects' : 'blog');

        $data = [];
        if ($accData['account']->is_publisher) {
            $view = view('profile.publisher.index');
            switch ($content) {
                case 'blog':
                    $data = $this->getProfileBlogData($accData['account']);
                    break;
                case 'projects':
                    $data = $this->getPublisherProjectsData($accData['account']);
                    break;
                case 'about':
                    break;
                default:
                    abort(404);
            }
        } else {
            $view = view('profile.user.index');
            switch ($content) {
                case 'blog':
                    $data = $this->getProfileBlogData($accData['account']);
                    break;
                case 'about':
                    break;
                default:
                    abort(404);
            }
        }

        return $view->with($accData)
            ->with($data)
            ->with('isOwner', $isOwner)
            ->with('content', $content);
    }

    public function about(Request $request, $login)
    {
        return redirect()->route('profile', ['login' => $login])
            ->with('content', 'about');
    }

    public function edit(Request $request)
    {
        $authAccount = Auth::user();
        $accData = $authAccount->getAccountData();

        if ($authAccount->is_publisher) {
            $view = view('profile.publisher.edit');
        } else {
            $view = view('profile.user.edit');
        }

        if (!$authAccount->profile()->exists()) {
            $view->with('info', 'Сперва заполните, пожалуйста, ваш профиль:');
        }

        return $view->with($accData);
    }

    public function edit_post(Request $request)
    {
        $authAccount = Auth::user();
        $hasProfile = $authAccount->profile()->exists();

        if ($authAccount->is_publisher) {
            Validator::validate($request->all(), [
                'avatar' => 'image|mimes:png,jpg,jpeg|max:2048',
                'name' => 'required|min:4|max:100',
                'about' => 'nullable|max:2000',
            ], [], [
                'avatar' => 'Аватар',
                'name' => 'Название издательства',
                'about' => 'Об издательстве',
            ]);

            if (!$hasProfile){
                $publisher = new Publisher($request->all());
                $publisher->account()->associate($authAccount);
            } else {
                $publisher = $authAccount->publisher;
                $publisher->update($request->all());
            }
            $publisher->save();
        } else {
            Validator::validate($request->all(), [
                'avatar' => 'image|mimes:png,jpg,jpeg|max:2048',
                'name' => 'nullable|min:2|max:100',
                'surname' => 'nullable|min:2|max:100',
                'about' => 'nullable|max:2000',
            ], [], [
                'avatar' => 'Аватар',
                'name' => 'Имя',
                'surname' => 'Фамилия',
                'about' => 'Обо мне',
            ]);

            if (!$hasProfile){
                $user = new User($request->all());
                $user->account()->associate($authAccount);
            } else {
                $user = $authAccount->user;
                $user->update($request->all());
            }
            $user->save();
        }

        if ($request->hasFile('avatar')) {
            $extension = $request->file('avatar')->getClientOriginalExtension();
            $fileName = 'avatar_'.$authAccount->id.'.'.$extension;
            $request->file('avatar')->storeAs('public/avatars', $fileName);
        } else {
            $fileName = 'no_avatar.png';
        }
        $authAccount->avatar = $fileName;
        $authAccount->save();

        return redirect()->route('profile', ['login' => $authAccount->login])
            ->with('success', 'Профиль успешно сохранён!');
    }

    protected function getProfileBlogData(Account $account)
    {
        $posts = $account->blogPosts()
            ->orderBy('created_at', 'desc')
            ->get();

        return [
            'posts' => $posts
        ];
    }

    protected function getPublisherProjectsData(Account $account)
    {
        $projects = $account->projects()
            ->orderBy('created_at', 'desc')
            ->get();

        return [
            'projects' => $projects
        ];
    }

    protected function redirectIfNoProfile(Account $account)
    {
        if (!$account->profile()->exists()) {
            return redirect()->route('profile-edit');
        }
        return null;
    }
}
