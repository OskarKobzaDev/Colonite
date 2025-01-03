<script setup>
import {Link} from "@inertiajs/vue3";
import LeftBarLink from "@/Components/LeftBarLink.vue";
import {Button} from "primevue";
import { ref } from "vue";
import {Drawer} from "primevue";


const visible = ref(false);
</script>

<template>
    <div class="flex max-w-64">
        <Button v-if="!visible" icon="pi pi-bars" @click="visible = true" class="sm:hidden w-12 h-16 rounded-tl-none rounded-bl-none bg-green-500 border-none fixed top-52 z-50" />

        <nav class="hidden sm:flex flex-col min-w-44 lg:min-w-64 h-[calc(100vh-4rem)] bg-green-500 sticky top-16 z-40 text-white text-xl">
            <div class="flex-grow mt-4 space-y-6">
                <div class="flex flex-col space-y-4 pl-6">
                    <p class="text-sm">General</p>
                    <LeftBarLink :href="route('dashboard')" :active="route().current('dashboard')" class="">
                        <i class="bi bi-house text-2xl"></i>
                        Dashboard</LeftBarLink>
                    <LeftBarLink :href="route('colleagues.index')" :active="route().current('colleagues.index')" class="">
                        <i class="bi bi-person-check-fill text-2xl"></i>
                        Colleagues</LeftBarLink>
                    <LeftBarLink :href="route('teams.index')" :active="route().current('teams.index')" class="">
                        <i class="pi pi-users text-2xl"></i>
                        Teams</LeftBarLink>
                    <LeftBarLink :href="route('projects.index')" :active="route().current('projects.index')" class="items-center">
                        <i class="pi pi-list text-2xl"></i>
                        Projects</LeftBarLink>
                    <LeftBarLink :href="route('calendar.index')" :active="route().current('calendar.index')" class="items-center">
                        <i class="bi bi-calendar-date text-2xl"></i>
                        Calendar</LeftBarLink>
                    <LeftBarLink :href="route('calls.index')" :active="route().current('calls.index')" class="items-center">
                        <i class="bi bi-camera-video text-2xl"></i>
                        Calls</LeftBarLink>

                </div>

                <div class="flex flex-col space-y-4 pl-6 border-t pt-2">
                    <p class="text-base">Current project</p>
                    <LeftBarLink :href="route('tasks.index')" :active="route().current('tasks.index')" class="">
                        <i class="pi pi-check-square text-2xl"></i>
                        Tasks</LeftBarLink>
                    <LeftBarLink :href="route('files.index')" :active="route().current('files.index')" class="">
                        <i class="pi pi-file text-2xl"></i>
                        Files</LeftBarLink>
                    <LeftBarLink :href="route('signboard.index')" :active="route().current('signboard.index')" class="">
                        <i class="bi bi-kanban text-2xl"></i>
                          Signboard</LeftBarLink>
                    <LeftBarLink :href="route('stats.index')" :active="route().current('stats.index')" class="items-center">
                        <i class="bi bi-clipboard-data text-2xl"></i>
                        Statistics</LeftBarLink>
                </div>
            </div>

            <div class="justify-center mt-auto pb-5 border-t">
                <div class="flex flex-col items-center mt-3">
                    <img class="size-8 rounded-full object-cover" :src="$page.props.auth.user.profile_photo_url" :alt="$page.props.auth.user.name">
                    <p class="text-sm mr-2 pl-6">{{ $page.props.auth.user.name }}</p>
                </div>

                <div class="flex flex-col mt-2 pl-6 space-y-4">
                    <LeftBarLink :href="route('profile.show')" :active="route().current('profile.show')" class="items-center">
                        <i class="pi pi-user text-2xl"></i>
                        Profile</LeftBarLink>
                    <LeftBarLink :href="route('settings.index')" :active="route().current('settings.index')" class="items-center">
                        <i class="bi bi-gear text-2xl"></i>
                        Settings</LeftBarLink>
                    <form @submit.prevent="$emit('logout')">
                        <Button type="submit" class="font-semibold px-1 mr-2 bg-red-500 rounded-md hover:!bg-red-700">
                          <i class="pi pi-arrow-circle-left"></i>
                          Log Out
                        </Button>
                    </form>
                </div>
            </div>
        </nav>

        <div class="card flex justify-center">
            <Drawer v-model:visible="visible" class="max-w-64">
                <template #container="{ closeCallback }">
                    <div class="flex flex-col h-full bg-green-500 text-white text-xl">
                      <div class="flex-grow mt-4 space-y-6">
                        <div class="flex flex-col space-y-4 pl-6">
                          <div class="flex justify-between">
                            <p class="text-sm">General</p>
                            <Button type="button" class="mr-2 bg-white" @click="closeCallback" icon="pi pi-times" rounded outlined></Button>
                          </div>

                          <LeftBarLink :href="route('dashboard')" :active="route().current('dashboard')" class="">
                            <i class="bi bi-house text-2xl"></i>
                            Dashboard</LeftBarLink>
                          <LeftBarLink :href="route('colleagues.index')" :active="route().current('colleagues.index')" class="">
                            <i class="bi bi-person-check-fill text-2xl"></i>
                            Colleagues</LeftBarLink>
                          <LeftBarLink :href="route('teams.index')" :active="route().current('teams.index')" class="">
                            <i class="pi pi-users text-2xl"></i>
                            Teams</LeftBarLink>
                          <LeftBarLink :href="route('projects.index')" :active="route().current('projects.index')" class="items-center">
                            <i class="pi pi-list text-2xl"></i>
                            Projects</LeftBarLink>
                          <LeftBarLink :href="route('calendar.index')" :active="route().current('calendar.index')" class="items-center">
                            <i class="bi bi-calendar-date text-2xl"></i>
                            Calendar</LeftBarLink>
                          <LeftBarLink :href="route('calls.index')" :active="route().current('calls.index')" class="items-center">
                            <i class="bi bi-camera-video text-2xl"></i>
                            Calls</LeftBarLink>

                        </div>

                        <div class="flex flex-col space-y-4 pl-6 border-t pt-2">
                          <p class="text-base">Current project</p>
                          <LeftBarLink :href="route('tasks.index')" :active="route().current('tasks.index')" class="">
                            <i class="pi pi-check-square text-2xl"></i>
                            Tasks</LeftBarLink>
                          <LeftBarLink :href="route('files.index')" :active="route().current('files.index')" class="">
                            <i class="pi pi-file text-2xl"></i>
                            Files</LeftBarLink>
                          <LeftBarLink :href="route('signboard.index')" :active="route().current('signboard.index')" class="">
                            <i class="bi bi-kanban text-2xl"></i>
                            Signboard</LeftBarLink>
                          <LeftBarLink :href="route('stats.index')" :active="route().current('stats.index')" class="items-center">
                            <i class="bi bi-clipboard-data text-2xl"></i>
                            Statistics</LeftBarLink>
                        </div>
                      </div>

                      <div class="justify-center mt-auto pb-5 border-t">
                        <div class="flex flex-col items-center mt-3">
                          <img class="size-12 rounded-full object-cover" :src="$page.props.auth.user.profile_photo_url" :alt="$page.props.auth.user.name">
                          <p class="text-md mr-2 pl-6">{{ $page.props.auth.user.name }}</p>
                        </div>

                        <div class="flex flex-col mt-2 space-y-4 pl-6">
                          <LeftBarLink :href="route('profile.show')" :active="route().current('profile.show')" class="items-center">
                            <i class="pi pi-user text-2xl"></i>
                            Profile</LeftBarLink>
                          <LeftBarLink :href="route('settings.index')" :active="route().current('settings.index')" class="items-center">
                            <i class="bi bi-gear text-2xl"></i>
                            Settings</LeftBarLink>
                          <form @submit.prevent="$emit('logout')">
                            <Button type="submit" class="font-semibold px-1 mr-2 bg-red-500 rounded-md hover:!bg-red-700">
                              <i class="pi pi-arrow-circle-left"></i>
                              Log Out
                            </Button>
                          </form>
                        </div>
                      </div>
                    </div>
                </template>
            </Drawer>

        </div>
    </div>
</template>



<style scoped>

</style>
