<script setup>
import { Head } from "@inertiajs/vue3";

defineProps({ service: Object });
</script>

<template>
    <Head :title="service.title" />
    <div>
        <h1 class="text-3xl font-bold">{{ service.title }}</h1>
    </div>
</template>
