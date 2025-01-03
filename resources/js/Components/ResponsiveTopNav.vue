<script setup>

import NavLink from "@/Components/NavLink.vue";
import Select from "primevue/select";
import {Link} from "@inertiajs/vue3";
import {ref} from "vue";
import {Button, Drawer} from "primevue";
import ResponsiveNavLinkTopBar from "@/Components/ResponsiveNavLinkTopBar.vue";

const selectedTeam = ref(null);
const selectedProject = ref(null);
const countries = ref([
    { name: 'Australia', code: 'AU' },
    { name: 'Brazil', code: 'BR' },
    { name: 'China', code: 'CN' },
    { name: 'Egypt', code: 'EG' },
    { name: 'France', code: 'FR' },
    { name: 'Germany', code: 'DE' },
    { name: 'India', code: 'IN' },
    { name: 'Japan', code: 'JP' },
    { name: 'Spain', code: 'ES' },
    { name: 'United States', code: 'US' }
]);
const teamSelected = ()=>{
    return selectedTeam !== null;
};
const projectSelected = ()=>{
    return selectedProject !== null;
};

const visible = ref(false);
</script>

<template>
    <nav class="bg-green-400 pr-10 sticky z-50 top-0 ">
        <!-- Primary Navigation Menu -->
        <div class="w-full mx-auto pl-4 sm:px-6 lg:px-8 ">
            <div class="flex justify-between h-16">
                <div class="flex justify-between md:justify-start w-full">
                    <!-- Logo -->
                    <Link :href="route('dashboard')" class="flex items-center block mr-16 lg:mr-0">
                        <img src="/images/logo_ant.svg" alt="Colonite_Logo" class="h-16">
                        <p class="text-4xl font-medium leading-5 mr-10">Colonite</p>
                    </Link>

                    <!-- Navigation Links -->
                    <div class="hidden md:space-x-2 sm:-my-px sm:ms-10 md:flex items-center">
                        <div class="flex items-center border p-1 rounded">
                            <i class="bi bi-person-workspace text-2xl text-white mr-2"></i>
                            <p class="mr-2 text-white font-medium leading-5 ">Workspace:</p>
                            <div class="card flex justify-center w-40 xl:w-56 mr-2">
                                <Select appendTo="self" v-model="selectedTeam" :options="countries" filter optionLabel="name" placeholder="Select Team" class="w-40 xl:w-56">
                                    <template #value="slotProps">
                                        <div v-if="slotProps.value" class="flex items-center">
                                            <img :alt="slotProps.value.label" src="https://primefaces.org/cdn/primevue/images/flag/flag_placeholder.png" :class="`mr-2 flag flag-${slotProps.value.code.toLowerCase()}`" style="width: 18px" />
                                            <div>{{ slotProps.value.name }}</div>
                                        </div>
                                        <span v-else>
                                                {{ slotProps.placeholder }}
                                            </span>
                                    </template>
                                    <template #option="slotProps">
                                        <div class="flex items-center">
                                            <img :alt="slotProps.option.label" src="https://primefaces.org/cdn/primevue/images/flag/flag_placeholder.png" :class="`mr-2 flag flag-${slotProps.option.code.toLowerCase()}`" style="width: 18px" />
                                            <div>{{ slotProps.option.name }}</div>
                                        </div>
                                    </template>
                                    <template #footer>
                                        <div>
                                            <Link :href="route('dashboard')" :active="route().current('dashboard')">
                                                New team
                                            </Link>
                                        </div>
                                    </template>
                                </Select>
                            </div>
                            <div class="card flex justify-center w-40 xl:w-56">
                                <Select appendTo="self" v-model="selectedProject" :options="countries" filter optionLabel="name" placeholder="Select Project" class=" w-40 lg:w-56">
                                    <template #value="slotProps">
                                        <div v-if="slotProps.value" class="flex items-center">
                                            <img :alt="slotProps.value.label" src="https://primefaces.org/cdn/primevue/images/flag/flag_placeholder.png" :class="`mr-2 flag flag-${slotProps.value.code.toLowerCase()}`" style="width: 18px" />
                                            <div>{{ slotProps.value.name }}</div>
                                        </div>
                                        <span v-else>
                                                {{ slotProps.placeholder }}
                                            </span>
                                    </template>
                                    <template #option="slotProps">
                                        <div class="flex items-center">
                                            <img :alt="slotProps.option.label" src="https://primefaces.org/cdn/primevue/images/flag/flag_placeholder.png" :class="`mr-2 flag flag-${slotProps.option.code.toLowerCase()}`" style="width: 18px" />
                                            <div>{{ slotProps.option.name }}</div>
                                        </div>
                                    </template>
                                    <template #footer>
                                        <div>
                                            <Link :href="route('dashboard')" :active="route().current('dashboard')">
                                                New team
                                            </Link>
                                        </div>
                                    </template>
                                </Select>
                            </div>
                        </div>
                    </div>

                    <Button @click="visible = true" class="min-w-16 bg-green-500 border-none flex md:hidden text-center text-white items-center ">
                        <i class="pi pi-bars text-2xl "></i>
                    </Button>
                </div>
            </div>
        </div>
        <div class="card flex justify-center">
            <Drawer v-model:visible="visible" position="top" style="height: auto">
                <template #container="{ closeCallback }">
                    <div class="flex flex-col h-full bg-green-400 pb-4">
                        <div class="flex items-center justify-between px-6 pt-4 shrink-0">
                        <span class="inline-flex items-center gap-2">
                                <img src="/images/logo_ant.svg" alt="Colonite_Logo" class="h-16">
                                <p class="text-4xl font-medium leading-5">Colonite</p>
                        </span>
                            <Button type="button" class="mr-2 bg-white" @click="closeCallback" icon="pi pi-times" rounded outlined></Button>
                        </div>
                        <div class="flex flex-col mx-6 md:mx-10 space-y-2">
                            <div class=" border border-white p-1 rounded">
                                <p class="text-xl font-medium leading-5">Workspace:</p>
                                <div class="flex justify-evenly ">
                                    <div class="card flex justify-center w-32 sm:w-44 md:w-56">
                                        <Select appendTo="self" v-model="selectedTeam" :options="countries" filter optionLabel="name" placeholder="Team Select" class=" w-32 sm:w-44 md:w-56">
                                            <template #value="slotProps">
                                                <div v-if="slotProps.value" class="flex items-center">
                                                    <img :alt="slotProps.value.label" src="https://primefaces.org/cdn/primevue/images/flag/flag_placeholder.png" :class="`mr-2 flag flag-${slotProps.value.code.toLowerCase()}`" style="width: 18px" />
                                                    <div>{{ slotProps.value.name }}</div>
                                                </div>
                                                <span v-else>
                                                {{ slotProps.placeholder }}
                                            </span>
                                            </template>
                                            <template #option="slotProps">
                                                <div class="flex items-center">
                                                    <img :alt="slotProps.option.label" src="https://primefaces.org/cdn/primevue/images/flag/flag_placeholder.png" :class="`mr-2 flag flag-${slotProps.option.code.toLowerCase()}`" style="width: 18px" />
                                                    <div>{{ slotProps.option.name }}</div>
                                                </div>
                                            </template>
                                            <template #footer>
                                                <div>
                                                    <Link :href="route('dashboard')" :active="route().current('dashboard')">
                                                        New team
                                                    </Link>
                                                </div>
                                            </template>
                                        </Select>
                                    </div>
                                    <div v-if="teamSelected" class="card flex justify-center w-32 sm:w-44 md:w-56">
                                        <Select appendTo="self" v-model="selectedCountry" :options="countries" filter optionLabel="name" placeholder="Project Select" class="w-32 sm:w-44 md:w-56">
                                            <template #value="slotProps">
                                                <div v-if="slotProps.value" class="flex items-center">
                                                    <img :alt="slotProps.value.label" src="https://primefaces.org/cdn/primevue/images/flag/flag_placeholder.png" :class="`mr-2 flag flag-${slotProps.value.code.toLowerCase()}`" style="width: 18px" />
                                                    <div>{{ slotProps.value.name }}</div>
                                                </div>
                                                <span v-else>
                                                {{ slotProps.placeholder }}
                                            </span>
                                            </template>
                                            <template #option="slotProps">
                                                <div class="flex items-center">
                                                    <img :alt="slotProps.option.label" src="https://primefaces.org/cdn/primevue/images/flag/flag_placeholder.png" :class="`mr-2 flag flag-${slotProps.option.code.toLowerCase()}`" style="width: 18px" />
                                                    <div>{{ slotProps.option.name }}</div>
                                                </div>
                                            </template>
                                            <template #footer>
                                                <div class="w-full">
                                                    <Link :href="route('dashboard')" :active="route().current('dashboard')" class="w-full text-center bg-green-400">
                                                        New project
                                                    </Link>
                                                </div>
                                            </template>
                                        </Select>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </template>
            </Drawer>
        </div>
    </nav>
</template>

<style scoped>

</style>
