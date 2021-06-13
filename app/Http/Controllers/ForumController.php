<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\ForumAnswer;
use App\Models\ForumSection;
use App\Models\ForumTopic;
use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class ForumController extends Controller
{
    public function section_get(Request $request, $domain, $id)
    {
        $project = Project::getByDomainOrFail($domain);

        $validator = Validator::make(['id' => $id],
            ['id' => 'integer']);
        if ($validator->fails()) {
            abort(404);
        }

        $section = $project->forumSections()->findOrFail($id);

        return view('forum.section.get')
            ->with(['project' => $project])
            ->with(['section' => $section]);
    }

    public function section_create(Request $request, $domain)
    {
        $project = Project::getByDomainOrFail($domain);

        if (Gate::denies('create-forum-section', $project)) {
            abort(403);
        }

        return view('forum.section.create')
            ->with(['project' => $project]);
    }

    public function section_create_post(Request $request, $domain)
    {
        $project = Project::getByDomainOrFail($domain);

        if (Gate::denies('create-forum-section', $project)) {
            abort(403);
        }

        Validator::validate($request->all(), [
            'title' => 'required|max:100',
            'about' => 'required|max:500',
        ], [], [
            'title' => 'Название',
            'about' => 'Описание',
        ]);

        $section = new ForumSection($request->all());
        $section->account()->associate(Auth::user());
        $project->forumSections()->save($section);

        return redirect()->route('project', [
            'domain' => $project->domain,
            'content' => 'forum'
        ])->with('success', 'Раздел успешно создан!');
    }

    public function topic_get(Request $request, $domain, $sec_id, $id)
    {
        $project = Project::getByDomainOrFail($domain);

        $validator = Validator::make(['sec_id' => $sec_id, 'id' => $id],
            ['sec_id' => 'integer', 'id' => 'integer']);
        if ($validator->fails()) {
            abort(404);
        }

        $section = $project->forumSections()->findOrFail($sec_id);
        $topic = $section->topics()->findOrFail($id);

        return view('forum.topic.get')
            ->with(['project' => $project])
            ->with(['section' => $section])
            ->with(['topic' => $topic]);
    }

    public function topic_create(Request $request, $domain, $sec_id)
    {
        $project = Project::getByDomainOrFail($domain);
        $section = $project->forumSections()->findOrFail($sec_id);

        if (Gate::denies('create-forum-topic', $section)) {
            abort(403);
        }

        return view('forum.topic.create')
            ->with(['project' => $project])
            ->with(['section' => $section]);
    }

    public function topic_create_post(Request $request, $domain, $sec_id)
    {
        $project = Project::getByDomainOrFail($domain);
        $section = $project->forumSections()->find($sec_id)->firstOrFail();

        if (Gate::denies('create-forum-topic', $section)) {
            abort(403);
        }

        Validator::validate($request->all(), [
            'title' => 'required|max:100',
            'text' => 'required|max:2000',
        ], [], [
            'title' => 'Заголовок',
            'text' => 'Описание',
        ]);

        $topic = new ForumTopic($request->all());
        $topic->account()->associate(Auth::user());
        $section->topics()->save($topic);

        return redirect()->route('forum-section', [
            'domain' => $project->domain,
            'id' => $section->id
        ])->with('success', 'Тема успешно создана!');
    }

    public function answer_create_post(Request $request, $domain, $sec_id, $id)
    {
        $project = Project::getByDomainOrFail($domain);

        $validator = Validator::make(['sec_id' => $sec_id, 'id' => $id],
            ['sec_id' => 'integer', 'id' => 'integer']);
        if ($validator->fails()) {
            abort(404);
        }

        $section = $project->forumSections()->findOrFail($sec_id);
        $topic = $section->topics()->findOrFail($id);

        if (Gate::denies('create-forum-answer', $topic)) {
            abort(403);
        }

        Validator::validate($request->all(), [
            'text' => 'required|max:2000',
        ]);

        $answer = new ForumAnswer($request->all());
        $answer->account()->associate(Auth::user());
        $topic->answers()->save($answer);

        return redirect()->route('forum-topic', [
            'domain' => $project->domain,
            'sec_id' => $section->id,
            'id' => $topic->id
        ]);
    }
}
