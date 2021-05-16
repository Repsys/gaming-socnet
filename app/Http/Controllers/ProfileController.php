<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\Publisher;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        $account = Auth::user();

        if (!$account->profile()->exists()) {
            return $this->create();
        }

        $data = [
            'account' => $account,
            'profile' => $account->profile,
        ];

        if ($account->is_publisher) {
            return view('profile.publisher.index', $data);
        } else {
            return view('profile.user.index', $data);
        }
    }

    public function create()
    {
        $account = Auth::user();

        if ($account->is_publisher) {
            return view('profile.publisher.create');
        } else {
            return view('profile.user.create');
        }
    }

    public function create_post(Request $request)
    {
        $account = Auth::user();
        if ($account->is_publisher) {
            Validator::validate($request->all(), [
                'name' => 'required|min:4|max:100',
                'about' => 'max:2000',
            ], [], [
                'name' => 'Название',
                'about' => 'Об издательстве',
            ]);

            $publisher = new Publisher($request->all());
            $publisher->account()->associate($account);
            $publisher->save();
        } else {
            Validator::validate($request->all(), [
                'name' => 'min:2|max:100',
                'surname' => 'min:2|max:100',
                'about' => 'max:2000',
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
