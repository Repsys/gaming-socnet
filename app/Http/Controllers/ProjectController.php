<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
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
        $sections = $project->forumSections()
            ->orderBy('created_at', 'desc')
            ->get();

        return [
            'sections' => $sections
        ];
    }

    public function create(Request $request)
    {
        $authAccount = Auth::user();

        if (Gate::denies('create-project')) {
            abort(403);
        }

        return view('projects.create');
    }

    public function create_post(Request $request)
    {
        $authAccount = Auth::user();

        if (Gate::denies('create-project')) {
            abort(403);
        }

        Validator::validate($request->all(), [
            'name' => 'required|max:100',
            'domain' => 'required|min:4|max:100|unique:projects',
            'about' => 'required|max:400',
            'preview_image' => 'image|mimes:png,jpg,jpeg|max:2048',
            'overview' => 'max:5000',
        ], [], [
            'name' => 'Название',
            'domain' => 'Домен',
            'about' => 'О проекте',
            'preview_image' => 'Превью',
            'overview' => 'Обзор',
        ]);

        $project = new Project($request->all());
        $project->is_closed = $request->has('is_closed');

        if ($request->hasFile('preview_image')) {
            $extension = $request->file('preview_image')->getClientOriginalExtension();
            $fileName = 'preview_'.$project->id.'.'.$extension;
            $request->file('preview_image')->storeAs('public/project/previews', $fileName);
        } else {
            $fileName = 'no_preview.png';
        }
        $project->preview_image = $fileName;

        $authAccount->projects()->save($project);

        return redirect()->route('profile', [
            'login' => $authAccount->login,
            'content' => 'projects',
        ])->with('success', 'Проект успешно создан!');
    }

    public function edit(Request $request, $domain)
    {
        $project = Project::whereDomain($domain)->firstOrFail();

        if (Gate::denies('edit-project', $project)) {
            abort(403);
        }

        return view('projects.edit')
            ->with(['project' => $project]);
    }

    public function edit_post(Request $request, $domain)
    {
        $project = Project::whereDomain($domain)->firstOrFail();

        if (Gate::denies('edit-project', $project)) {
            abort(403);
        }

        Validator::validate($request->all(), [
            'name' => 'required|max:100',
            'domain' => 'required|min:4|max:100|unique:projects,domain,'.$project->id,
            'about' => 'required|max:400',
            'preview_image' => 'image|mimes:png,jpg,jpeg|max:2048',
            'overview' => 'max:5000',
        ], [], [
            'name' => 'Название',
            'domain' => 'Домен',
            'about' => 'О проекте',
            'preview_image' => 'Превью',
            'overview' => 'Обзор',
        ]);

        $project->update($request->all());
        $project->is_closed = $request->has('is_closed');

        if ($request->hasFile('preview_image')) {
            $extension = $request->file('preview_image')->getClientOriginalExtension();
            $fileName = 'preview_'.$project->id.'.'.$extension;
            $request->file('preview_image')->storeAs('public/project/previews', $fileName);
            $project->preview_image = $fileName;
        }
        $project->save();

        return redirect()->route('project', [
            'domain' => $project->domain
        ])->with('success', 'Проект успешно сохранён!');
    }
}
