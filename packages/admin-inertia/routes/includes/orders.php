<?php

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Lunar\Hub\Http\Livewire\Pages\Orders\OrderShow;
use Lunar\Hub\Http\Livewire\Pages\Orders\OrdersIndex;
use Lunar\Models\Order;

/**
 * Channel routes.
 */
Route::group([
    // TODO: uncomment this after middleware implementation
    // 'middleware' => 'can:catalogue:manage-orders',
], function () {
    Route::get('/', fn () => Inertia::render('Orders/Index'))->name('hub.orders.index');

    Route::group([
        'prefix' => '{order}',
    ], function () {
        Route::get('/', fn () => Inertia::render('Orders/Show'))->name('hub.orders.show');

        // TODO:
        // Route::get('/pdf', function (Order $order, Request $request) {
        //     return Pdf::loadView('adminhub::pdf.order', [
        //         'order' => $order,
        //     ])->stream("Order-{$order->reference}.pdf");
        // })->name('hub.orders.pdf');
    });
});
