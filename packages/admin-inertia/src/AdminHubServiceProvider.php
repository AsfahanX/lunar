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
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        // Commands
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallHub::class,
            ]);
        }
    }
}
