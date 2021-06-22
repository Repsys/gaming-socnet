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

            $user = Account::factory([
                'password' => bcrypt('qwe123asd')
            ])->create();

            $browser->visit('/')
                ->click('.auth-link')
                ->type('login', $user->login)
                ->type('password', 'qwe123asd')
                ->click('.login-btn')
                ->assertPathIs('/profile/edit');
        });
    }
}
