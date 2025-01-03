<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: String,
    active: Boolean,
});

const classes = computed(() => {
    return props.active
        ? 'relative'
        : 'relative group transition-all duration-300 ease-in-out hover:-translate-x-2';
});
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
        <span
            :class="[
                'absolute bottom-0 left-0 h-[2px] bg-white transition-all duration-300 ease-in-out',
                props.active ? 'w-full' : 'w-0 group-hover:w-full'
            ]"
        ></span>
    </Link>
</template>

<style scoped>
.Link {
    position: relative;
}

.Link::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    height: 2px;
    width: 0;
    background-color: white;
    transition: width 0.3s ease-in-out;
}

.Link:hover::after {
    width: 100%;
}
</style>
