<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ShowProjectTest extends DuskTestCase
{
    public function testLoginAsPublisher()
    {
        $this->browse(function (Browser $browser) {
            $user = $this->loginAsPublisher($browser);
            $this->fillProfile($browser, $user);
            $project = $this->createProject($browser);

            $browser->visit('/projects/'.$project->domain)
                ->assertPathIs('/projects/'.$project->domain)
                ->assertSee($project->name)
                ->screenshot('ShowProjectTest');
        });
    }

    public function testLoginAsUser()
    {
        $this->browse(function (Browser $browser) {
            $user = $this->loginAsPublisher($browser);
            $this->fillProfile($browser, $user);
            $project = $this->createProject($browser);

            $user = $this->loginAsUser($browser);

            $browser->visit('/projects/'.$project->domain)
                ->assertPathIs('/projects/'.$project->domain)
                ->assertSee($project->name);
        });
    }

    public function testNotLogin()
    {
        $this->browse(function (Browser $browser) {
            $user = $this->loginAsPublisher($browser);
            $this->fillProfile($browser, $user);
            $project = $this->createProject($browser);
            $browser->logout();

            $browser->visit('/projects/'.$project->domain)
                ->assertPathIs('/projects/'.$project->domain)
                ->assertSee($project->name);
        });
    }
}
