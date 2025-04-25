<script setup>
import { Head } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

defineOptions({
    layout: AuthenticatedLayout,
});

defineProps({ contacts: Array });
</script>

<template>
    <Head title="Admin" />

    <div class="py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <h1 class="mb-6 text-3xl font-bold">Přijaté zprávy</h1>

        <div v-if="contacts.length === 0" class="text-gray-600">
            Žádné zprávy.
        </div>

        <div v-else class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-100">
                    <tr>
                        <th
                            class="px-6 py-3 text-sm font-medium text-left text-gray-700"
                        >
                            Jméno
                        </th>
                        <th
                            class="px-6 py-3 text-sm font-medium text-left text-gray-700"
                        >
                            Příjmení
                        </th>
                        <th
                            class="px-6 py-3 text-sm font-medium text-left text-gray-700"
                        >
                            Zpráva
                        </th>
                        <th
                            class="px-6 py-3 text-sm font-medium text-left text-gray-700"
                        >
                            Datum
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="contact in contacts"
                        :key="contact.id"
                        class="border-b"
                    >
                        <td class="px-6 py-4">{{ contact.first_name }}</td>
                        <td class="px-6 py-4">{{ contact.last_name }}</td>
                        <td class="px-6 py-4">{{ contact.message }}</td>
                        <td class="px-6 py-4">
                            {{ new Date(contact.created_at).toLocaleString() }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
