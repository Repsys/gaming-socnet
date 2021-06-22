<?php

namespace Tests\Browser;

use Faker\Guesser\Name;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testRegisterPublisher()
    {
        $this->browse(function (Browser $browser) {
            $password = 'qwe123asd';

            $browser->visit('/')
                ->click('.auth-link')
                ->click('.register-link')
                ->type('login', 'testPublisher')
                ->type('email', 'qwerty@mail.ru')
                ->type('password', $password)
                ->type('password_confirmation', $password)
                ->check('is_publisher')
                ->click('.register-btn')
                ->assertPathIs('/login')
                ->assertPresent('.alert-success');
        });
    }
}
