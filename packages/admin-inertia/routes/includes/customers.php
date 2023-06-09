<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Lunar\Hub\Http\Livewire\Pages\Customers\CustomerShow;
use Lunar\Hub\Http\Livewire\Pages\Customers\CustomersIndex;

/**
 * Channel routes.
 */
Route::group([
    // TODO: uncomment this after middleware implementation
    // 'middleware' => 'can:catalogue:manage-customers',
], function () {
    Route::get('/', fn () => Inertia::render('Customers/Index'))->name('hub.customers.index');

    Route::group([
        'prefix' => '{customer}',
    ], function () {
        Route::get('/', fn () => Inertia::render('Customers/Show'))->name('hub.customers.show');
    });
});
