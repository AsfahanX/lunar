<script setup>
import { Head } from '@inertiajs/vue3';

defineProps({
    title: String,
})
</script>

<template>
    <Head :title="title || $page.props.title" />

    <!-- TODO: Setup layout based on packages\admin\resources\views\layouts\app.blade.php -->

    <slot />
</template>
