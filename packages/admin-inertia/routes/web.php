<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Lunar\Hub\Inertia\Http\Middleware\HandleInertiaRequests;

Route::group([
    'prefix' => config('lunar-hub.system.path', 'hub'),
    'middleware' => array_merge(
        [HandleInertiaRequests::class],
        config('lunar-hub.system.middleware', ['web'])
    ),
], function() {
    Route::get('/', function() {
        return Inertia::render('Dashboard');
    })->name('hub.index');
});
