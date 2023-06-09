<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Lunar\Hub\Http\Livewire\Pages\Collections\CollectionGroupShow;
use Lunar\Hub\Http\Livewire\Pages\Collections\CollectionGroupsIndex;
use Lunar\Hub\Http\Livewire\Pages\Collections\CollectionShow;

/**
 * Channel routes.
 */
Route::group([
    // TODO: uncomment this after middleware implementation
    // 'middleware' => 'can:catalogue:manage-collections',
], function () {
    Route::group([
        'prefix' => 'collection-groups',
    ], function () {
        Route::get('/', fn () => Inertia::render('Collections/CollectionGroups/Index'))->name('hub.collection-groups.index');

        Route::group([
            'prefix' => '{group}',
        ], function () {
            Route::get('/', fn () => Inertia::render('Collections/CollectionGroups/Show'))->name('hub.collection-groups.show');

            Route::get('/collections/{collection}', fn () => Inertia::render('Collections/Show'))->name('hub.collections.show');
        });
    });
});
