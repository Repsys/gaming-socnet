<?php

namespace Tests\Browser;

use App\Models\Account;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testLogin()
    {
        $this->browse(function (Browser $browser) {

            $browser->visit('/')
                ->click('.auth-link')
                ->click('.register-link')
                ->type('login', 'testUser')
                ->type('email', 'testUser@mail.ru')
                ->type('password', 'qwe123asd')
                ->type('password_confirmation', 'qwe123asd')
                ->click('.register-btn');

            $browser->visit('/')
                ->click('.auth-link')
                ->type('login', 'testUser')
                ->type('password', 'qwe123asd')
                ->click('.login-btn')
                ->screenshot('ggg')
                ->assertPathIs('/profile/edit')
                ->screenshot('LoginTest');
        });
    }
}
