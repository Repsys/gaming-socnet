<?php

namespace App\Providers;

use App\Models\Account;
use App\Models\ForumSection;
use App\Models\Project;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
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

        Gate::define('create-forum-section', function (Account $account, Project $project) {
            return $project->account->id == $account->id;
        });

        Gate::define('create-forum-topic', function (Account $account, ForumSection $section) {
            return $section->project->account->id == $account->id;
        });
    }
}
