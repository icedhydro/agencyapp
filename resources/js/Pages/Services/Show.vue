<script setup>
defineProps({ service: Object });
</script>

<template>
    <div>
        <h1 class="text-3xl font-bold">{{ service.title }}</h1>
    </div>
</template>
