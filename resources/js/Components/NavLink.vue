<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: String,
    active: Boolean,
});

const classes = computed(() => {
    return props.active
        ? 'inline-flex items-center bg-gray-50 px-1 py-2 rounded-md border-b-2 border-indigo-400 text-sm font-semibold leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
        : 'inline-flex items-center bg-gray-50 px-1 py-2 rounded-md border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
});
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
