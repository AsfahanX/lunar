<script setup>
import AppSide from '@/Components/Menus/AppSide.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    title: String,
})
</script>

<template>
    <Head :title="title || $page.props.title" />

    <!-- TODO: Setup layout based on packages\admin\resources\views\layouts\app.blade.php -->

    <AppSide />
    <main>
        <slot />
    </main>
</template>
