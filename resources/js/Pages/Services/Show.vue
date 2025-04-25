<script setup>
import { Head } from "@inertiajs/vue3";
import GuestLayout from "@/Layouts/GuestLayout.vue";

defineOptions({
    layout: GuestLayout,
});

defineProps({ service: Array });
</script>

<template>
    <Head :title="service.title" />
    <div>
        <h1 class="text-3xl font-bold">{{ service.title }}</h1>
    </div>
</template>
