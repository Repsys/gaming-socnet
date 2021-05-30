<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request, $login)
    {
        $account = Account::whereLogin($login)->first();
        if (!$account->is_publisher) {
            abort(404);
        }
        $projects = $account->publisher->projects;

        return redirect()->route('profile', ['login' => $login])
            ->with('content', 'projects')
            ->with('projects', $projects);
    }
}
