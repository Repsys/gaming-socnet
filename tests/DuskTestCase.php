<?php

namespace Tests;

use App\Models\Account;
use App\Models\BlogPost;
use App\Models\Project;
use App\Models\Publisher;
use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Faker\Generator;
use Illuminate\Container\Container;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Dusk\TestCase as BaseTestCase;

abstract class DuskTestCase extends BaseTestCase
{
    use CreatesApplication;
    use RefreshDatabase;

    /**
     * Prepare for Dusk test execution.
     *
     * @beforeClass
     * @return void
     */
    public static function prepare()
    {
        if (!static::runningInSail()) {
            static::startChromeDriver();
        }
    }

    public function loginAsUser($browser)
    {
        $browser->logout();

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
            ->click('.login-btn');

        $user = Account::whereLogin('testUser')->firstOrFail();
        return $user;
    }

    public function loginAsPublisher($browser)
    {
        $browser->logout();

        $browser->visit('/')
            ->click('.auth-link')
            ->click('.register-link')
            ->type('login', 'testPublisher')
            ->type('email', 'testPublisher@mail.ru')
            ->type('password', 'qwe123asd')
            ->type('password_confirmation', 'qwe123asd')
            ->check('is_publisher')
            ->click('.register-btn');

        $browser->visit('/')
            ->click('.auth-link')
            ->type('login', 'testPublisher')
            ->type('password', 'qwe123asd')
            ->click('.login-btn');

        $user = Account::whereLogin('testPublisher')->firstOrFail();
        return $user;
    }

    public function fillProfile($browser, $user)
    {
        if ($user->is_publisher) {
            $browser->visit('/profile/edit')
                ->type('name', 'TestName')
                ->type('about', 'About test publisher')
                ->click('.edit-save-btn');
        } else {
            $browser->visit('/profile/edit')
                ->type('name', 'TestName')
                ->type('surname', 'TestSurname')
                ->type('about', 'About test user')
                ->click('.edit-save-btn');
        }
    }

    public function createProject($browser)
    {
        $browser->visit('/profile')
            ->click('.projects-create-btn')
            ->type('name', 'TestProject')
            ->type('domain', 'test_proj')
            ->type('about', 'TestProject about text')
            ->attach('preview_image', __DIR__.'/Browser/Images/preview_1.jpg')
            ->type('overview', 'TestProject overview text')
            ->click('.create-project-btn');

        $project = Project::whereDomain('test_proj')->firstOrFail();
        return $project;
    }

    public function createBlogPost($browser, $user)
    {
        $browser->visit('/profile/'.$user->login.'/blog')
            ->click('.blog-create-btn')
            ->type('title', 'Test Post Title')
            ->type('text', 'Test Post Test Post Test Post Test Post Test Post Test Post ')
            ->attach('image', __DIR__.'/Browser/Images/preview_1.jpg')
            ->click('.create-post-btn');

        $post = BlogPost::whereTitle('Test Post Title')->firstOrFail();
        return $post;
    }

    /**
     * Create the RemoteWebDriver instance.
     *
     * @return \Facebook\WebDriver\Remote\RemoteWebDriver
     */
    protected function driver()
    {
        $options = (new ChromeOptions)->addArguments(collect([
            '--window-size=1920,1080',
        ])->unless($this->hasHeadlessDisabled(), function ($items) {
            return $items->merge([
                '--disable-gpu',
                '--headless',
            ]);
        })->all());

        return RemoteWebDriver::create(
            $_ENV['DUSK_DRIVER_URL'] ?? 'http://localhost:9515',
            DesiredCapabilities::chrome()->setCapability(
                ChromeOptions::CAPABILITY, $options
            )
        );
    }

    /**
     * Determine whether the Dusk command has disabled headless mode.
     *
     * @return bool
     */
    protected function hasHeadlessDisabled()
    {
        return isset($_SERVER['DUSK_HEADLESS_DISABLED']) ||
            isset($_ENV['DUSK_HEADLESS_DISABLED']);
    }
}
