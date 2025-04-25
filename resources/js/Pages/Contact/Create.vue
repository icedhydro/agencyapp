<script setup>
import { Head, useForm } from "@inertiajs/vue3";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

defineOptions({
    layout: GuestLayout,
});

const form = useForm({
    first_name: "",
    last_name: "",
    message: "",
});

const submit = () => {
    form.post(route("contact.store"), {
        onSuccess: () => form.reset(),
    });
};
</script>

<template>
    <Head title="Kontakt" />
    <div class="max-w-xl mx-auto">
        <h1 class="mb-4 text-3xl font-bold">Kontaktujte nás</h1>

        <form @submit.prevent="submit" class="space-y-6">
            <div>
                <InputLabel for="first_name" value="Jméno" />
                <TextInput
                    id="first_name"
                    v-model="form.first_name"
                    type="text"
                    class="block w-full mt-1"
                    autocomplete="given-name"
                />
                <InputError :message="form.errors.first_name" class="mt-2" />
            </div>

            <div>
                <InputLabel for="last_name" value="Příjmení" />
                <TextInput
                    id="last_name"
                    v-model="form.last_name"
                    type="text"
                    class="block w-full mt-1"
                    autocomplete="family-name"
                />
                <InputError :message="form.errors.last_name" class="mt-2" />
            </div>

            <div>
                <InputLabel for="message" value="Zpráva" />
                <textarea
                    id="message"
                    v-model="form.message"
                    rows="5"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                ></textarea>
                <InputError :message="form.errors.message" class="mt-2" />
            </div>

            <div class="flex justify-end">
                <PrimaryButton :disabled="form.processing">
                    Odeslat zprávu
                </PrimaryButton>
            </div>
        </form>
    </div>
</template>
