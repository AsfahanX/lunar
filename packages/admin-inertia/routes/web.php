<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => config('lunar-hub.system.path', 'hub'),
    'middleware' => config('lunar-hub.system.middleware', ['web'])
], function() {
    Route::get('/', fn () => 'Coming Soon: Lunar Admin Hub with InertiaJS "stack"')->name('hub.index');
});
