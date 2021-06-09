<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\ForumTopic;
use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ForumController extends Controller
{
    public function topic_get(Request $request, $domain, $id)
    {
        $project = Project::getByDomainOrFail($domain);

        $validator = Validator::make(['id' => $id],
            ['id' => 'integer']);
        if ($validator->fails()) {
            abort(404);
        }

        $topic = $project->forumTopics()->findOrFail($id);

        return view('forum.topic.get')
            ->with(['project' => $project])
            ->with(['topic' => $topic]);
    }

    public function topic_create(Request $request, $domain)
    {
        $project = Project::getByDomainOrFail($domain);

        $authAccount = Auth::user();
        if ($project->account->id !== $authAccount->id) {
            abort(404); // TODO сделать через политики...
        }

        return view('forum.topic.create')
            ->with(['project' => $project]);
    }

    public function topic_create_post(Request $request, $domain)
    {
        $project = Project::getByDomainOrFail($domain);

        $authAccount = Auth::user();
        if ($project->account->id !== $authAccount->id) {
            abort(404); // TODO сделать через политики...
        }

        Validator::validate($request->all(), [
            'name' => 'required|max:100',
            'about' => 'required|max:500',
        ], [], [
            'name' => 'Название',
            'about' => 'Описание',
        ]);

        $topic = new ForumTopic($request->all());
        $project->forumTopics()->save($topic);

        return redirect()->route('project', [
            'domain' => $project->domain,
            'content' => 'forum'
        ])->with('success', 'Тема успешно создана!');
    }
}
