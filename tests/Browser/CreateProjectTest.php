<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreateProjectTest extends DuskTestCase
{
    public function testCreate()
    {
        $this->browse(function (Browser $browser) {
            $user = $this->loginAsPublisher($browser);
            $this->fillProfile($browser, $user);

            $browser->visit('/profile')
                ->click('.projects-create-btn')
                ->assertSee('Создание нового проекта')
                ->type('name', 'TestProject')
                ->type('domain', 'test_proj')
                ->type('about', 'TestProject about text')
                ->attach('preview_image', __DIR__.'/Images/preview_1.jpg')
                ->type('overview', 'TestProject overview text')
                ->click('.create-project-btn')
                ->screenshot('createProjectTest')
                ->assertPathIs('/profile/'.$user->login.'/projects')
                ->assertPresent('.alert-success');
        });
    }
}
