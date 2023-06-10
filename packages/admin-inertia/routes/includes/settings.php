<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Lunar\Hub\Http\Livewire\Pages\Settings\ActivityLog\ActivityLogIndex;
use Lunar\Hub\Http\Livewire\Pages\Settings\Addons\AddonShow;
use Lunar\Hub\Http\Livewire\Pages\Settings\Addons\AddonsIndex;
use Lunar\Hub\Http\Livewire\Pages\Settings\Attributes\AttributeShow;
use Lunar\Hub\Http\Livewire\Pages\Settings\Attributes\AttributesIndex;
use Lunar\Hub\Http\Livewire\Pages\Settings\Channels\ChannelCreate;
use Lunar\Hub\Http\Livewire\Pages\Settings\Channels\ChannelShow;
use Lunar\Hub\Http\Livewire\Pages\Settings\Channels\ChannelsIndex;
use Lunar\Hub\Http\Livewire\Pages\Settings\Currencies\CurrenciesIndex;
use Lunar\Hub\Http\Livewire\Pages\Settings\Currencies\CurrencyCreate;
use Lunar\Hub\Http\Livewire\Pages\Settings\Currencies\CurrencyShow;
use Lunar\Hub\Http\Livewire\Pages\Settings\CustomerGroups\CustomerGroupCreate;
use Lunar\Hub\Http\Livewire\Pages\Settings\CustomerGroups\CustomerGroupShow;
use Lunar\Hub\Http\Livewire\Pages\Settings\CustomerGroups\CustomerGroupsIndex;
use Lunar\Hub\Http\Livewire\Pages\Settings\Languages\LanguageCreate;
use Lunar\Hub\Http\Livewire\Pages\Settings\Languages\LanguageShow;
use Lunar\Hub\Http\Livewire\Pages\Settings\Languages\LanguagesIndex;
use Lunar\Hub\Http\Livewire\Pages\Settings\Product\Options\OptionEdit;
use Lunar\Hub\Http\Livewire\Pages\Settings\Product\Options\OptionsIndex;
use Lunar\Hub\Http\Livewire\Pages\Settings\Staff\StaffCreate;
use Lunar\Hub\Http\Livewire\Pages\Settings\Staff\StaffIndex;
use Lunar\Hub\Http\Livewire\Pages\Settings\Staff\StaffShow;
use Lunar\Hub\Http\Livewire\Pages\Settings\Tags\TagShow;
use Lunar\Hub\Http\Livewire\Pages\Settings\Tags\TagsIndex;
use Lunar\Hub\Http\Livewire\Pages\Settings\Taxes\TaxClassesIndex;
use Lunar\Hub\Http\Livewire\Pages\Settings\Taxes\TaxZoneCreate;
use Lunar\Hub\Http\Livewire\Pages\Settings\Taxes\TaxZoneShow;
use Lunar\Hub\Http\Livewire\Pages\Settings\Taxes\TaxZonesIndex;

Route::get('/', function () {
    return redirect()->route('hub.attributes.index');
})->name('hub.settings');

/**
 * Activity Log.
 */
Route::get('activity-log', fn () => Inertia::render('Settings/ActivityLog/Index'))->name('hub.activity-log.index');

/**
 * Attribute routes.
 */
Route::group([
    // TODO: uncomment this after middleware implementation
    // 'middleware' => 'can:settings:manage-attributes',
], function () {
    Route::get('attributes', fn () => Inertia::render('Settings/Attributes/Index'))->name('hub.attributes.index');
    Route::get('attributes/{type}', fn () => Inertia::render('Settings/Attributes/Show'))->name('hub.attributes.show');
});

/**
 * Channel routes.
 */
Route::group([
    // TODO: uncomment this after middleware implementation
    // 'middleware' => 'can:settings:core',
], function () {
    Route::get('channels', fn () => Inertia::render('Settings/Channels/Index'))->name('hub.channels.index');
    Route::get('channels/create', fn () => Inertia::render('Settings/Channels/Create'))->name('hub.channels.create');
    Route::get('channels/{channel}', fn () => Inertia::render('Settings/Channels/Show'))->name('hub.channels.show');
});

/**
 * Staff.
 */
Route::group([
    // TODO: uncomment this after middleware implementation
    // 'middleware' => 'can:settings:manage-staff',
], function () {
    Route::get('staff', fn () => Inertia::render('Settings/Staff/Index'))->name('hub.staff.index');
    Route::get('staff/create', fn () => Inertia::render('Settings/Staff/Create'))->name('hub.staff.create');
    Route::get('staff/{staff}', fn () => Inertia::render('Settings/Staff/Show'))->withTrashed()->name('hub.staff.show');
});

/**
 * Customer Groups.
 */
Route::group([
    // TODO: uncomment this after middleware implementation
    // 'middleware' => 'can:settings:manage-staff',
], function () {
    Route::get('customer-groups', fn () => Inertia::render('Settings/CustomerGroups/Index'))->name('hub.customer-groups.index');
    Route::get('customer-groups/create', fn () => Inertia::render('Settings/CustomerGroups/Create'))->name('hub.customer-groups.create');
    Route::get('customer-groups/{customerGroup}', fn () => Inertia::render('Settings/CustomerGroups/Show'))->withTrashed()->name('hub.customer-groups.show');
});

/*
/**
 * Languages.
 */
Route::group([
    // TODO: uncomment this after middleware implementation
    // 'middleware' => 'can:settings:core',
], function () {
    Route::get('languages', fn () => Inertia::render('Settings/Languages/Index'))->name('hub.languages.index');
    Route::get('languages/create', fn () => Inertia::render('Settings/Languages/Create'))->name('hub.languages.create');
    Route::get('languages/{language}', fn () => Inertia::render('Settings/Languages/Show'))->withTrashed()->name('hub.languages.show');
});

/**
 * Currencies.
 */
Route::group([
    // TODO: uncomment this after middleware implementation
    // 'middleware' => 'can:settings:core',
], function () {
    Route::get('currencies', fn () => Inertia::render('Settings/Currencies/Index'))->name('hub.currencies.index');
    Route::get('currencies/create', fn () => Inertia::render('Settings/Currencies/Create'))->name('hub.currencies.create');
    Route::get('currencies/{currency}', fn () => Inertia::render('Settings/Currencies/Show'))->name('hub.currencies.show');
});

/*
 * Addons.
 */
Route::group([
    // TODO: uncomment this after middleware implementation
    // 'middleware' => 'can:settings',
], function () {
    Route::get('addons', fn () => Inertia::render('Settings/Addons/Index'))->name('hub.addons.index');
    Route::get('addons/{addon}', fn () => Inertia::render('Settings/Addons/Show'))->name('hub.addons.show');
});

/**
 * Channel routes.
 */
Route::group([
    // TODO: uncomment this after middleware implementation
    // 'middleware' => 'can:settings:core',
    'prefix' => 'tags',
], function () {
    Route::get('/', fn () => Inertia::render('Settings/Tags/Index'))->name('hub.tags.index');
    // Route::get('channels/create', ChannelCreate::class)->name('hub.channels.create');
    Route::get('tags/{tag}', fn () => Inertia::render('Settings/Tags/Show'))->name('hub.tags.show');
});

/**
 * Product options routes.
 */
Route::group([
    // TODO: uncomment this after middleware implementation
    // 'middleware' => 'can:settings:core',
    'prefix' => 'product',
], function () {
    Route::get('options', fn () => Inertia::render('Settings/Product/Options/Index'))->name('hub.product.options.index');
    Route::get('options/{productOption}', fn () => Inertia::render('Settings/Product/Options/Edit'))->name('hub.product.options.edit');
});

/**
 * Taxes.
 */
Route::group([
    // TODO: uncomment this after middleware implementation
    // 'middleware' => 'can:settings:core',
    'prefix' => 'taxes',
], function () {
    Route::get('/tax-zones', fn () => Inertia::render('Settings/Taxes/TaxZones/Index'))->name('hub.taxes.index');
    Route::get('/tax-zones/create', fn () => Inertia::render('Settings/Taxes/TaxZones/Create'))->name('hub.taxes.create');
    Route::get('/tax-zones/{taxZone}', fn () => Inertia::render('Settings/Taxes/TaxZones/Show'))->name('hub.taxes.show');
    Route::get('/tax-classes', fn () => Inertia::render('Settings/Taxes/TaxClasses/Index'))->name('hub.taxes.tax-classes.index');
});
