<?php

namespace GiangNT\LaravelNotification\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use GiangNT\LaravelNotification\NotificationServiceProvider;

/**
 * Class BaseTests
 *
 * @package Tests
 */
class TestCase extends Orchestra
{
    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp() : void
    {
        parent::setUp();

        $this->artisan('migrate', ['--database' => 'testing']);

        $this->beforeApplicationDestroyed(function () {
            $this->artisan('migrate:rollback');
        });
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'testing');
    }

    /**
     * Get Notification package providers.
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            NotificationServiceProvider::class,
        ];
    }
}