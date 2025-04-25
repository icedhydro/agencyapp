<script setup>
defineProps({ services: Array });
</script>

<template>
    <div>
        <h1 class="mb-6 text-3xl font-bold">Our Services</h1>
        <ul>
            <li v-for="service in services" :key="service.id" class="mb-4">
                <a
                    :href="route('services.show', service.slug)"
                    class="text-blue-600 hover:underline"
                >
                    {{ service.title }}
                </a>
            </li>
        </ul>
    </div>
</template>
