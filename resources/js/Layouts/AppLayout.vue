<script setup>
import { ref } from 'vue';
import { Head, Link, router } from '@inertiajs/vue3';
import ApplicationMark from '@/Components/ApplicationMark.vue';
import Banner from '@/Components/Banner.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import Select from 'primevue/select';
import {Button} from "primevue";
import ResponsiveTopNav from "@/Components/ResponsiveTopNav.vue";
import ResponsiveLeftBar from "@/Components/ResponsiveLeftBar.vue";
import LeftBar from "@/Components/ResponsiveLeftBar.vue";

defineProps({
    title: String,
});

const showingNavigationDropdown = ref(false);

const switchToTeam = (team) => {
    router.put(route('current-team.update'), {
        team_id: team.id,
    }, {
        preserveState: false,
    });
};

const logout = () => {
    router.post(route('logout'));
};




</script>

<template>
    <div>
        <Head :title="title" />

        <Banner />

        <div class="min-h-screen bg-green-200 scrollbar-none scrollbar-thin">

            <ResponsiveTopNav />

            <div class="flex w-100%">

                <ResponsiveLeftBar @logout="logout"/>

                <div class="flex flex-col w-full">
                    <!-- Page Heading -->
                    <header v-if="$slots.header" class="flex bg-white shadow sticky top-16 z-40">
                        <div class="flex py-6 px-4 sm:px-6 lg:px-8 items-center">
                            <slot name="header" /> w przyszłości bredcrumbsy
                        </div>
                    </header>

                    <!-- Page Content -->
                    <main>
                        <slot />
                    </main>
                </div>
            </div>

        </div>
    </div>
</template>
