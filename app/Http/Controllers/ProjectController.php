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
        $project = Project::getByDomainOrFail($domain);

        $content = $content ?? 'overview';
        $data = [];
        switch ($content) {
            case 'overview':
                break;
            case 'forum':
                $data = $this->getProjectForumData($project);
                break;
            default:
                abort(404);
        }

        return view('projects.get')
            ->with($data)
            ->with('project', $project)
            ->with('content', $content);
    }

    protected function getProjectForumData(Project $project)
    {
        $topics = $project->forumTopics()
            ->orderBy('created_at', 'desc')
            ->get();

        return [
            'topics' => $topics
        ];
    }

    public function create(Request $request)
    {
        $authAccount = Auth::user();

        if (!$authAccount->is_publisher) {
            abort(404); // TODO сделать через политики...
        }

        return view('projects.create');
    }

    public function create_post(Request $request)
    {
        $authAccount = Auth::user();

        if (!$authAccount->is_publisher) {
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
        $authAccount->projects()->save($project);

        return redirect()->route('profile', [
            'login' => $authAccount->login,
            'content' => 'projects',
        ])->with('success', 'Проект успешно создан!');
    }
}
