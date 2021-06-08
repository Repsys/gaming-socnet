<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $projects = Project::query()
            ->orderBy('created_at', 'desc')
            ->get();

        return view('projects', ['projects' => $projects]);
    }

    public function get(Request $request, $domain, $content = null)
    {
        $validator = Validator::make(['domain' => $domain],
            ['domain' => 'string']);
        if ($validator->fails()) {
            abort(404);
        }

        $project = Project::whereDomain($domain)->firstOrFail();

        $content = $content ?? 'overview';
        switch ($content) {
            case 'overview':
                break;
            case 'forum':
                break;
            default:
                abort(404);
        }

        return view('projects.get')
            ->with('project', $project)
            ->with('content', $content);
    }

    public function create(Request $request)
    {
        $account = Auth::user();

        if (!$account->is_publisher) {
            abort(404); // TODO сделать через политики...
        }

        return view('projects.create');
    }

    public function create_post(Request $request)
    {
        $account = Auth::user();

        if (!$account->is_publisher) {
            abort(404); // TODO сделать через политики...
        }

        Validator::validate($request->all(), [
            'name' => 'required|max:100',
            'domain' => 'required|min:4|max:100|unique:projects',
            'about' => 'required|max:5000',
        ], [], [
            'name' => 'Название',
            'domain' => 'Домен',
            'about' => 'О проекте',
        ]);

        $project = new Project($request->all());
        $project->is_closed = $request->has('is_closed');
        $account->projects()->save($project);

        return redirect()->route('profile', [
            'content' => 'projects',
            'login' => $account->login
        ])->with('success', 'Проект успешно создан!');
    }
}
