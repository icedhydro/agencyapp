<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";

defineProps({ contacts: Array });
</script>

<template>
    <Head title="Administrace - Kontakty" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Přijaté zprávy
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white">
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
                                        <td class="px-6 py-4">
                                            {{ contact.first_name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ contact.last_name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ contact.message }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{
                                                new Date(
                                                    contact.created_at
                                                ).toLocaleString("cs-CZ")
                                            }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
