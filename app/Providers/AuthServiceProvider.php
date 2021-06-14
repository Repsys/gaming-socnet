<?php

namespace App\Providers;

use App\Models\Account;
use App\Models\BlogPost;
use App\Models\ForumSection;
use App\Models\ForumTopic;
use App\Models\Project;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Проекты
        Gate::define('create-project', function (Account $account) {
            return $account->is_publisher;
        });
        Gate::define('edit-project', function (Account $account, Project $project) {
            return $project->account->id == $account->id;
        });

        // Блог
        Gate::define('create-blog-comment', function (Account $account, BlogPost $post) {
            return true;
        });
        Gate::define('delete-blog-post', function (Account $account, BlogPost $post) {
            return $post->account->id == $account->id;
        });

        // Форум
        Gate::define('create-forum-section', function (Account $account, Project $project) {
            return $project->account->id == $account->id;
        });
        Gate::define('delete-forum-section', function (Account $account, Project $project) {
            return $project->account->id == $account->id;
        });

        Gate::define('create-forum-topic', function (Account $account, ForumSection $section) {
            return true;
        });
        Gate::define('delete-forum-topic', function (Account $account, ForumSection $section) {
            return $section->account->id == $account->id ||
                $section->project->account->id == $account->id;
        });

        Gate::define('create-forum-answer', function (Account $account, ForumTopic $topic) {
            return true;
        });
        Gate::define('delete-forum-answer', function (Account $account, ForumTopic $topic) {
            return $topic->account->id == $account->id ||
                $topic->project->account->id == $account->id;
        });
    }
}
