<script setup>
import { Head } from "@inertiajs/vue3";
import GuestLayout from "@/Layouts/GuestLayout.vue";

defineProps({ services: Array });
</script>

<template>
    <Head title="Služby" />

    <GuestLayout>
        <template #default>
            <div class="max-w-3xl mx-auto">
                <h1 class="mb-8 text-3xl font-bold text-center">Naše služby</h1>

                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <div
                        v-for="service in services"
                        :key="service.id"
                        class="p-6 transition-all duration-200 bg-white border border-gray-200 rounded-lg shadow hover:shadow-lg"
                    >
                        <h2 class="mb-2 text-xl font-semibold text-gray-800">
                            {{ service.title }}
                        </h2>
                        <a
                            :href="route('services.show', service.slug)"
                            class="inline-block mt-4 text-sm font-medium text-blue-600 hover:underline"
                        >
                            Zobrazit více →
                        </a>
                    </div>
                </div>
            </div>
        </template>
    </GuestLayout>
</template>
