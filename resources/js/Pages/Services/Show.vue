<script setup>
import { Head } from "@inertiajs/vue3";
import GuestLayout from "@/Layouts/GuestLayout.vue";

defineProps({ service: Object });
</script>

<template>
    <Head :title="service.title" />

    <GuestLayout>
        <template #default>
            <div class="max-w-2xl mx-auto">
                <h1 class="mb-6 text-3xl font-bold text-gray-900">
                    {{ service.title }}
                </h1>

                <p class="text-gray-600">
                    Detail této služby zatím neobsahuje více informací.
                </p>

                <div class="mt-6">
                    <a
                        :href="route('home')"
                        class="text-sm text-blue-600 hover:underline"
                    >
                        ← Zpět na přehled služeb
                    </a>
                </div>
            </div>
        </template>
    </GuestLayout>
</template>
