<script setup>
import { Head, useForm } from "@inertiajs/vue3";

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
    <Head title="Contact" />
    <div class="max-w-xl mx-auto">
        <h1 class="mb-4 text-3xl font-bold">Contact Us</h1>

        <div
            v-if="$page.props.flash.success"
            class="p-4 mb-4 text-green-700 bg-green-200 rounded"
        >
            {{ $page.props.flash.success }}
        </div>

        <form @submit.prevent="submit">
            <div class="mb-4">
                <label class="block">First Name</label>
                <input
                    v-model="form.first_name"
                    type="text"
                    class="w-full p-2 border rounded"
                />
                <div v-if="form.errors.first_name" class="text-red-500">
                    {{ form.errors.first_name }}
                </div>
            </div>

            <div class="mb-4">
                <label class="block">Last Name</label>
                <input
                    v-model="form.last_name"
                    type="text"
                    class="w-full p-2 border rounded"
                />
                <div v-if="form.errors.last_name" class="text-red-500">
                    {{ form.errors.last_name }}
                </div>
            </div>

            <div class="mb-4">
                <label class="block">Message</label>
                <textarea
                    v-model="form.message"
                    rows="5"
                    class="w-full p-2 border rounded"
                ></textarea>
                <div v-if="form.errors.message" class="text-red-500">
                    {{ form.errors.message }}
                </div>
            </div>

            <button
                type="submit"
                :disabled="form.processing"
                class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600"
            >
                Send Message
            </button>
        </form>
    </div>
</template>
