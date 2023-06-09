<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Lunar\Hub\Http\Livewire\Pages\Discounts\DiscountCreate;
use Lunar\Hub\Http\Livewire\Pages\Discounts\DiscountShow;
use Lunar\Hub\Http\Livewire\Pages\Discounts\DiscountsIndex;

/**
 * Channel routes.
 */
Route::group([
    // TODO: uncomment this after middleware implementation
    // 'middleware' => 'can:catalogue:manage-discounts',
], function () {
    Route::get('/', fn () => Inertia::render('Discounts/Index'))->name('hub.discounts.index');
    Route::get('create', fn () => Inertia::render('Discounts/Create'))->name('hub.discounts.create');
    Route::get('{discount}', fn () => Inertia::render('Discounts/Show'))->name('hub.discounts.show');
});
