<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EditProjectTest extends DuskTestCase
{
    public function testEdit()
    {
        $this->browse(function (Browser $browser) {
            $user = $this->loginAsPublisher($browser);
            $this->fillProfile($browser, $user);
            $project = $this->createProject($browser);

            $browser->visit('/projects/'.$project->domain)
                ->assertSee($project->name)
                ->click('.projects-edit-btn')
                ->type('name', 'NewProject')
                ->type('domain', 'new_proj')
                ->type('about', 'NewProject about text')
                ->attach('preview_image', __DIR__.'/Images/no_preview.png')
                ->type('overview', 'TestProject overview text')
                ->click('.project-save-btn')
                ->assertPresent('.alert-success')
                ->assertPathIs('/projects/new_proj')
                ->assertSee('NewProject')
                ->assertSee('NewProject about text')
                ->screenshot('EditProjectTest');
        });
    }
}
