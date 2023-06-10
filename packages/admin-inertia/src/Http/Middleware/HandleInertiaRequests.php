<?php

namespace Lunar\Hub\Inertia\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;
use Lunar\Hub\Facades\Menu;
use Lunar\Hub\Menu\MenuGroup;
use Lunar\Hub\Menu\MenuSection;
use Lunar\Hub\Menu\MenuSlot;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     *
     * @var string
     */
    protected $rootView = 'adminhub::app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     */
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            'menu' => fn () => [
                'sidebar' => $this->slotToArray(Menu::slot('sidebar')),
                'settings' => $request->user('staff')?->can('settings')
                    ? $this->slotToArray(Menu::slot('settings'))
                    : null,
            ],
        ]);
    }

    public function slotToArray(MenuSlot|MenuGroup|MenuSection $slot): array
    {
        $visibleProperties = ['name', 'handle', 'icon', 'route', 'gate'];

        return collect(
            [
                'items' => $slot->getItems()
                    ->map(fn ($itemObject) => collect((array) $itemObject)
                        ->only($visibleProperties)
                        ->reject(fn ($value) => empty($value)))
                    ->all(),

                'groups' => $slot->getGroups()
                    ->map(fn ($group) => $this->slotToArray($group))
                    ->all(),

                'sections' => $slot->getSections()
                    ->map(fn ($section) => $this->slotToArray($section))
                    ->all(),

                'name' => $slot?->name ?? '',
                'handle' => $slot?->handle ?? '',
                'icon' => $slot?->icon ?? '',
                'route' => $slot?->route ?? '',
            ]
        )->reject(
            fn ($value) => empty($value)
        )->all();
    }
}
