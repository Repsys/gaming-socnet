<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function get(Request $request, $login, $id)
    {
        $account = Account::whereLogin($login)->firstOrFail();

        $validator = Validator::make(['id' => $id],
            ['id' => 'integer']);
        if ($validator->fails()) {
            abort(404);
        }

        $post = $account->blogPosts()->findOrFail($id);

        $accData = Account::getAccountDataByLogin($login);
        return view('profile.blog.get', $accData)
            ->with('post', $post);
    }

    public function create(Request $request)
    {
        $account = Auth::user();
        $accData = $account->getAccountData();

        return view('profile.blog.create')->with($accData);
    }

    public function create_post(Request $request)
    {
        $account = Auth::user();

        Validator::validate($request->all(), [
            'title' => 'required|max:100',
            'text' => 'required|max:5000',
        ], [], [
            'title' => 'Заголовок',
            'text' => 'Текст',
        ]);

        $post = new BlogPost($request->all());
        $account->blogPosts()->save($post);

        return redirect()->route('profile', [
            'content' => 'blog',
            'login' => $account->login
        ])->with('success', 'Пост успешно создан!');
    }
}
