<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Lunar\Hub\Http\Livewire\Pages\Products\ProductTypes\ProductTypeCreate;
use Lunar\Hub\Http\Livewire\Pages\Products\ProductTypes\ProductTypeIndex;
use Lunar\Hub\Http\Livewire\Pages\Products\ProductTypes\ProductTypeShow;

Route::group([
    // TODO: uncomment this after middleware implementation
    // 'middleware' => 'can:catalogue:manage-products',
], function () {
    Route::get('/', fn () => Inertia::render('Products/ProductTypes/Index', ['title' => 'Product Types']))->name('hub.product-types.index');
    Route::get('create', fn () => Inertia::render('Products/ProductTypes/Create', ['title' => 'Create Product Type']))->name('hub.product-types.create');
    Route::get('{productType}', fn () => Inertia::render('Products/ProductTypes/Show', ['title' => 'Edit Product']))->name('hub.product-types.show');
});
