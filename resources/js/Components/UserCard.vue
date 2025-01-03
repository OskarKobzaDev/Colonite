<script setup>
import {Card} from "primevue";
import {Button} from "primevue";

defineProps([
    'colleague'
])
</script>

<template>
    <Card class="items-center border flex-col max-h-56 max-w-44" style="overflow: hidden; text-align: center">
        <template #header>
            <div class="w-full justify-center">
                <img class="size-12 rounded-full object-cover" :src="colleague.profile_photo_url" :alt="colleague.name">
            </div>
        </template>
        <template #title><p class="text-base text-nowrap overflow-x-hidden">{{ colleague.name }}</p></template>
        <template #subtitle>Status?</template>
        <template #content>
            <p class="m-0">

            </p>
        </template>
        <template #footer>
            <div class="flex gap-4 mt-auto">
                <Button label="Cancel" severity="secondary" outlined class="w-full" />
                <Button label="Save" class="w-full" />
            </div>
        </template>
    </Card>
</template>

<style scoped>

</style>
