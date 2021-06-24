<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreateBlogCommentTest extends DuskTestCase
{
    public function testCreatePublisher()
    {
        $this->browse(function (Browser $browser) {
            $user = $this->loginAsPublisher($browser);
            $this->fillProfile($browser, $user);

            $post = $this->createBlogPost($browser, $user);

            $browser->click('.read-more-btn')
                ->screenshot('ggg')
                ->type('text', 'Comment for testing Comment for testing')
                ->click('.add-comment-btn')
                ->screenshot('createCommentTest')
                ->assertPathIs('/profile/'.$user->login.'/blog/1');
        });
    }

    public function testCreateUser()
    {
        $this->browse(function (Browser $browser) {
            $user = $this->loginAsUser($browser);
            $this->fillProfile($browser, $user);

            $post = $this->createBlogPost($browser, $user);

            $browser->click('.read-more-btn')
                ->screenshot('ggg')
                ->type('text', 'Comment for testing Comment for testing')
                ->click('.add-comment-btn')
                ->screenshot('createCommentTest')
                ->assertPathIs('/profile/'.$user->login.'/blog/2');
        });
    }
}
