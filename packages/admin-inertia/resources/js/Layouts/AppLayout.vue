<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    title: String,
})
</script>

<template>
    <Head :title="title || $page.props.title" />

    <!-- TODO: Setup layout based on packages\admin\resources\views\layouts\app.blade.php -->

    <!-- TODO: extract this menus section as component -->
    <!-- TODO: change to dynamic menu list from server side -->
    <Link v-for="menu in [
        'hub.account',

        'hub.index',
        'hub.products.index',
        'hub.product-types.index',
        'hub.brands.index',
        'hub.collection-groups.index',
        'hub.orders.index',
        'hub.customers.index',
        'hub.discounts.index',
        // 'hub.settings',
    ]" :href="route(menu)" :key="menu" class="flex">
        {{ menu }}
    </Link>

    <main>
        <slot />
    </main>
</template>
