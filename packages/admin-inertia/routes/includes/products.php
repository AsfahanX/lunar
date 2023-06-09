<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Lunar\Hub\Http\Livewire\Pages\Products\ProductCreate;
use Lunar\Hub\Http\Livewire\Pages\Products\ProductShow;
use Lunar\Hub\Http\Livewire\Pages\Products\ProductsIndex;
use Lunar\Hub\Http\Livewire\Pages\Products\Variants\VariantShow;

/**
 * Channel routes.
 */
Route::group([
    // TODO: uncomment this after middleware implementation
    // 'middleware' => 'can:catalogue:manage-products',
], function () {
    Route::get('/', fn () => Inertia::render('Products/Index', ['title' => 'Products']))->name('hub.products.index');
    Route::get('create', fn () => Inertia::render('Products/Create', ['title' => 'Create Product']))->name('hub.products.create');

    Route::group([
        'prefix' => '{product}',
    ], function () {
        Route::get('/', fn () => Inertia::render('Products/Show', ['title' => 'Edit Product']))->name('hub.products.show');

        Route::group([
            'prefix' => 'variants',
        ], function () {
            Route::get('{variant}', fn () => Inertia::render('Variants/Show', ['title' => 'Edit Variant']))->name('hub.products.variants.show');
        });
    });
});
