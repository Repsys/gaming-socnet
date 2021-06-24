<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreateBlogPostTest extends DuskTestCase
{
    public function testCreatePublisher()
    {
        $this->browse(function (Browser $browser) {
            $user = $this->loginAsPublisher($browser);
            $this->fillProfile($browser, $user);

            $browser->visit('/profile/'.$user->login.'/blog')
                ->click('.blog-create-btn')
                ->assertSee('Создание нового поста')
                ->type('title', 'Test Post Title')
                ->type('text', 'Test Post Test Post Test Post Test Post Test Post Test Post ')
                ->attach('image', __DIR__.'/Images/preview_1.jpg')
                ->click('.create-post-btn')
                ->assertPathIs('/profile/'.$user->login.'/blog')
                ->assertPresent('.alert-success')
                ->screenshot('createPostTest');
        });
    }

    public function testCreateUser()
    {
        $this->browse(function (Browser $browser) {
            $user = $this->loginAsUser($browser);
            $this->fillProfile($browser, $user);

            $browser->visit('/profile/'.$user->login.'/blog')
                ->screenshot('ggg')
                ->click('.blog-create-btn')
                ->assertSee('Создание нового поста')
                ->type('title', 'Test Post Title')
                ->type('text', 'Test Post Test Post Test Post Test Post Test Post Test Post ')
                ->attach('image', __DIR__.'/Images/preview_1.jpg')
                ->click('.create-post-btn')
                ->assertPathIs('/profile/'.$user->login.'/blog')
                ->assertPresent('.alert-success')
                ->screenshot('createPostTest');
        });
    }
}
