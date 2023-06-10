<script setup>
import { Link, usePage } from '@inertiajs/vue3';

const sidebar = usePage().props.menu.sidebar;
</script>

<template>
    <Link v-for="item in sidebar.items" :href="route(item.route)" :key="item" class="flex">
        {{ item.name }}
    </Link>

    <div v-for="group in sidebar.groups" :key="group.name">
        {{ group.name }}

        <Link v-for="groupItem in group.items" :href="route(groupItem.route)" :key="groupItem" class="flex">
            {{ groupItem.name }}
        </Link>

        <div v-for="section in group.sections" :key="section.name">
            <Link :href="route(section.route)" class="flex">
                {{ section.name }}
            </Link>

            <Link v-for="sectionItem in section.items" :href="route(sectionItem.route)" :key="sectionItem" class="flex">
                {{ sectionItem.name }}
            </Link>
        </div>
    </div>

    <Link v-if="$page.props.menu.settings" :href="route('hub.settings')">
        {{ __('adminhub::global.settings') }}
    </Link>
</template>
