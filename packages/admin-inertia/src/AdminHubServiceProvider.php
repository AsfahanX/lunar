<?php

namespace Lunar\Hub\Inertia;

use Illuminate\Support\ServiceProvider;
use Lunar\Hub\Inertia\Console\Commands\InstallHub;

class AdminHubServiceProvider extends ServiceProvider
{
    /**
     * Boot up the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPublishables();

        // Commands
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallHub::class,
            ]);
        }

        if (config('lunar-hub.system.stack') === 'inertia') {
            $this->bootInertia();
        }
    }

    protected function bootInertia()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'adminhub');
    }

    /**
     * Register our publishables.
     *
     * @return void
     */
    private function registerPublishables()
    {
        $this->publishes([
            __DIR__.'/../public' => public_path('vendor/lunar/admin-hub/'),
        ], 'lunar.hub.public');
    }
}
