<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EditProfileTest extends DuskTestCase
{
    public function testEditPublisher()
    {
        $this->browse(function (Browser $browser) {
            $user = $this->loginAsPublisher($browser);

            $browser->visit('/profile/edit')
                ->assertSee('Профиль издателя '.$user->login)
                ->type('name', 'TestName')
                ->type('about', 'About test publisher')
                ->click('.edit-save-btn')
                ->assertPresent('.alert-success')
                ->assertSee('TestName')
                ->screenshot('EditPublisherTest');
        });
    }

    public function testEditUser()
    {
        $this->browse(function (Browser $browser) {
            $user = $this->loginAsUser($browser);

            $browser->visit('/profile/edit')
                ->assertSee('Профиль пользователя '.$user->login)
                ->type('name', 'TestName')
                ->type('surname', 'TestSurname')
                ->type('about', 'About test user')
                ->click('.edit-save-btn')
                ->assertPresent('.alert-success')
                ->assertSee('TestName TestSurname')
                ->screenshot('EditUserTest');
        });
    }
}
