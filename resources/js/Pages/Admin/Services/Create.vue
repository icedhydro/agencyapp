<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm, Link } from "@inertiajs/vue3";
import Input from "@/Components/TextInput.vue";
import Textarea from "@/Components/TextArea.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";

const form = useForm({
    title: "",
    slug: "",
    description: "",
});

const submit = () => {
    form.post(route("admin.services.store"));
};
</script>

<template>
    <Head title="Přidat službu" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Přidat novou službu
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white">
                        <form @submit.prevent="submit" class="space-y-6">
                            <!-- Title -->
                            <div>
                                <label class="block mb-1 font-medium"
                                    >Název služby</label
                                >
                                <Input
                                    v-model="form.title"
                                    type="text"
                                    class="w-full"
                                    required
                                />
                                <div
                                    v-if="form.errors.title"
                                    class="mt-1 text-sm text-red-500"
                                >
                                    {{ form.errors.title }}
                                </div>
                            </div>

                            <!-- Slug -->
                            <div>
                                <label class="block mb-1 font-medium"
                                    >Slug</label
                                >
                                <Input
                                    v-model="form.slug"
                                    type="text"
                                    class="w-full"
                                    required
                                />
                                <div
                                    v-if="form.errors.slug"
                                    class="mt-1 text-sm text-red-500"
                                >
                                    {{ form.errors.slug }}
                                </div>
                            </div>

                            <!-- Description -->
                            <div>
                                <label class="block mb-1 font-medium"
                                    >Popis</label
                                >
                                <Textarea
                                    v-model="form.description"
                                    rows="5"
                                    class="w-full"
                                />
                                <div
                                    v-if="form.errors.description"
                                    class="mt-1 text-sm text-red-500"
                                >
                                    {{ form.errors.description }}
                                </div>
                            </div>

                            <!-- Buttons -->
                            <div class="flex items-center gap-4">
                                <PrimaryButton :disabled="form.processing"
                                    >Vytvořit</PrimaryButton
                                >

                                <Link :href="route('admin.services.index')">
                                    <SecondaryButton type="button"
                                        >Zpět</SecondaryButton
                                    >
                                </Link>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
