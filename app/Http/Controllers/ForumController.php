<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index(Request $request, $login)
    {
        $accData = Account::getAccountDataByLogin($login);

        return view('forum.index', $accData);
    }
}
