<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ShowProfileTest extends DuskTestCase
{
    public function testLoginAsPublisher()
    {
        $this->browse(function (Browser $browser) {
            $user = $this->loginAsPublisher($browser);
            $this->fillProfile($browser, $user);

            $browser->assertAuthenticatedAs($user)
                ->visit('/profile')
                ->assertPathIs('/profile/edit')
                ->screenshot('ShowProfilePublisherTest');
        });
    }

    public function testLoginAsUser()
    {
        $this->browse(function (Browser $browser) {
            $user = $this->loginAsUser($browser);
            $this->fillProfile($browser, $user);

            $browser->assertAuthenticatedAs($user)
                ->visit('/profile')
                ->assertPathIs('/profile/edit')
                ->screenshot('ShowProfileUserTest');
        });
    }

    public function testNotLogin()
    {
        $this->browse(function (Browser $browser) {
            $browser->logout();
            $browser->visit('/profile')
                ->assertSee('NOT FOUND')
                ->screenshot('ShowProfileNotLoginTest');
        });
    }
}
