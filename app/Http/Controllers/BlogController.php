<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request, $login)
    {
        $account = Account::whereLogin($login)->first();
        $posts = $account->blogPosts;

        return redirect()->route('profile', ['login' => $login])
            ->with('content', 'blog')
            ->with('posts', $posts);
    }
}
