<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import UserCard from "@/Components/UserCard.vue";
import {InputText} from "primevue";
defineProps([
    'colleagues',
]);
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Colleagues
            </h2>
        </template>

        <div class="py-6 px-6 flex flex-col">
            <div>
                <InputText type="text" v-model="value" />
            </div>
            <div class="flex flex-wrap">
                <div class="flex flex-wrap p-4 bg-white shadow-xl sm:rounded-lg">
                    <div v-for="colleague in colleagues.data" :key="colleague.id">
                        <UserCard :colleague="colleague"></UserCard>
                    </div>

                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped>

</style>
