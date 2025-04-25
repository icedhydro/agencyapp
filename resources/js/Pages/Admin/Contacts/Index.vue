<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, router } from "@inertiajs/vue3";
import { ref } from "vue";
import Input from "@/Components/TextInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import DangerButton from "@/Components/DangerButton.vue";

const props = defineProps({ contacts: Object, filters: Object });

const search = ref(props.filters.search || "");

const searchContacts = () => {
    router.get(
        route("admin.contacts.index"),
        { search: search.value },
        {
            preserveState: true,
            preserveScroll: true,
        }
    );
};

const deleteContact = (id) => {
    if (confirm("Opravdu chcete tuto zprávu smazat?")) {
        router.delete(route("admin.contacts.destroy", id), {
            preserveScroll: true,
        });
    }
};
</script>

<template>
    <Head title="Zprávy" />

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
                        <!-- Search -->
                        <div class="flex items-center justify-end gap-2 mb-6">
                            <Input
                                v-model="search"
                                type="text"
                                class="w-64"
                                placeholder="Hledat..."
                            />
                            <PrimaryButton @click="searchContacts">
                                Hledat
                            </PrimaryButton>
                        </div>

                        <!-- Contacts table -->
                        <div
                            v-if="contacts.data.length === 0"
                            class="text-gray-600"
                        >
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
                                        <th class="px-6 py-3"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="contact in contacts.data"
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
                                        <td class="px-6 py-4 text-right">
                                            <DangerButton
                                                @click="
                                                    deleteContact(contact.id)
                                                "
                                            >
                                                Smazat
                                            </DangerButton>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <!-- Pagination -->
                            <div class="flex justify-center mt-6 space-x-2">
                                <template
                                    v-for="(link, index) in contacts.links"
                                    :key="index"
                                >
                                    <button
                                        v-if="link.url"
                                        @click="
                                            router.visit(link.url, {
                                                preserveState: true,
                                                preserveScroll: true,
                                            })
                                        "
                                        class="px-3 py-1 text-sm border rounded"
                                        :class="{
                                            'bg-indigo-500 text-white':
                                                link.active,
                                        }"
                                        v-html="link.label"
                                    ></button>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
