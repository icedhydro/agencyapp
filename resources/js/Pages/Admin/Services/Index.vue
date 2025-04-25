<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, router } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import DangerButton from "@/Components/DangerButton.vue";

defineProps({
    services: Object,
});

// delete func
function deleteService(id) {
    if (confirm("Opravdu chcete službu odstranit?")) {
        router.delete(route("admin.services.destroy", id));
    }
}
</script>

<template>
    <Head title="Administrace - Služby" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Seznam služeb
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white">
                        <!-- Add button -->
                        <div class="flex justify-end mb-6">
                            <Link :href="route('admin.services.create')">
                                <PrimaryButton>Přidat službu</PrimaryButton>
                            </Link>
                        </div>

                        <!-- Table -->
                        <div
                            v-if="services.data.length === 0"
                            class="text-gray-600"
                        >
                            Žádné služby.
                        </div>

                        <div v-else class="overflow-x-auto">
                            <table class="min-w-full bg-white">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th
                                            class="px-6 py-3 text-sm font-medium text-left text-gray-700"
                                        >
                                            Název
                                        </th>
                                        <th
                                            class="px-6 py-3 text-sm font-medium text-left text-gray-700"
                                        >
                                            Slug
                                        </th>
                                        <th
                                            class="px-6 py-3 text-sm font-medium text-left text-gray-700"
                                        >
                                            Akce
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="service in services.data"
                                        :key="service.id"
                                        class="border-b"
                                    >
                                        <td class="px-6 py-4">
                                            {{ service.title }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ service.slug }}
                                        </td>
                                        <td class="px-6 py-4 space-x-2">
                                            <Link
                                                :href="
                                                    route(
                                                        'admin.services.edit',
                                                        service.id
                                                    )
                                                "
                                            >
                                                <PrimaryButton
                                                    >Upravit</PrimaryButton
                                                >
                                            </Link>
                                            <DangerButton
                                                @click="
                                                    deleteService(service.id)
                                                "
                                            >
                                                Smazat
                                            </DangerButton>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <!-- Pagination -->
                            <div class="mt-6">
                                <nav
                                    v-if="services.links.length > 3"
                                    class="flex justify-center"
                                >
                                    <template v-for="link in services.links">
                                        <Link
                                            :href="link.url || ''"
                                            v-html="link.label"
                                            class="px-3 py-1 mx-1 text-sm rounded"
                                            :class="{
                                                'bg-blue-500 text-white':
                                                    link.active,
                                                'text-gray-700 hover:bg-gray-200':
                                                    !link.active,
                                            }"
                                        />
                                    </template>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
