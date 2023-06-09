<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Lunar\Hub\Http\Livewire\Pages\Brands\BrandShow;
use Lunar\Hub\Http\Livewire\Pages\Brands\BrandsIndex;

Route::group([
    // TODO: uncomment this after middleware implementation
    // 'middleware' => 'can:catalogue:manage-products',
], function () {
    Route::get('/', fn () => Inertia::render('Brands/Index'))->name('hub.brands.index');
    Route::get('{brand}', fn () => Inertia::render('Brands/Show'))->name('hub.brands.show');
});
