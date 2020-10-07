<?php

namespace GiangNT\LaravelNotification;

use Illuminate\Support\ServiceProvider;

class NotificationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/notification.php' => config_path('notification.php'),
        ]);

        $this->publishes([
            __DIR__.'/../databases/stubs/2020_09_25_145256_create_notifications_table.stub' => database_path('migrations/'.date('Y_m_d_His', time()).'create_notifications_table.php'),
        ], 'migrations');

        $this->loadMigrationsFrom(__DIR__ . '/../databases/migrations');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/notification.php', 'notification'
        );
    }
}
