<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Lunar\Hub\Http\Middleware\Authenticate;
use Lunar\Hub\Http\Middleware\RedirectIfAuthenticated;
use Lunar\Hub\Inertia\Http\Middleware\HandleInertiaRequests;

Route::group([
    'prefix' => config('lunar-hub.system.path', 'hub'),
    'middleware' => array_merge(
        [HandleInertiaRequests::class],
        config('lunar-hub.system.middleware', ['web'])
    ),
], function() {
    Route::post('logout', function () {
        Auth::guard('staff')->logout();

        return redirect()->route('hub.login');
    })->name('hub.logout');

    Route::group([
        'middleware' => RedirectIfAuthenticated::class,
    ], function ($router) {
        $router->get('login', fn () => Inertia::render('Authentication/Login'))->name('hub.login');
        $router->get('password-reset', fn () => Inertia::render('Authentication/PasswordReset'))->name('hub.password-reset');
    });

    Route::group([
        'middleware' => [
            // TODO: uncomment this after login implementation
            // Authenticate::class,
        ],
    ], function ($router) {
        $router->get('/', fn () => Inertia::render('Dashboard'))->name('hub.index');

        Route::get('account', fn () => Inertia::render('Account', ['title' => __('adminhub::account.title')]))->name('hub.account');

        Route::group([
            'prefix' => 'products',
        ], __DIR__.'/includes/products.php');

        // Route::group([
        //     'prefix' => 'product-types',
        // ], __DIR__.'/includes/product-types.php');

        // Route::group([
        //     'prefix' => 'orders',
        // ], __DIR__.'/includes/orders.php');

        // Route::group([], __DIR__.'/includes/collections.php');

        // Route::group([
        //     'prefix' => 'settings',
        // ], __DIR__.'/includes/settings.php');

        // Route::group([
        //     'prefix' => 'customers',
        // ], __DIR__.'/includes/customers.php');

        // Route::group([
        //     'prefix' => 'discounts',
        // ], __DIR__.'/includes/discounts.php');

        // Route::group([
        //     'prefix' => 'brands',
        // ], __DIR__.'/includes/brands.php');

        // Route::group([
        //     'prefix' => 'assets',
        // ], __DIR__.'/includes/assets.php');
    });
});
