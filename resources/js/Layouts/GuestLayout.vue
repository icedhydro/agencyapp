<script setup>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import { Link, usePage } from "@inertiajs/vue3";
import { toast } from "vue3-toastify";
import { watch } from "vue";
import NavLink from "@/Components/NavLink.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import Footer from "@/Components/Footer.vue";

const page = usePage();

// Flash message watch
watch(
    () => page.props.flash,
    (flash) => {
        if (flash?.success) {
            toast.success(flash.success);
        }
        if (flash?.error) {
            toast.error(flash.error);
        }
    },
    { immediate: true }
);
</script>

<template>
    <div class="flex flex-col min-h-screen bg-gray-100">
        <!-- Logo + Top Navigation -->
        <header class="bg-white shadow-sm">
            <div
                class="flex items-center justify-between max-w-4xl px-6 py-4 mx-auto"
            >
                <Link href="/">
                    <ApplicationLogo
                        class="w-12 h-12 text-gray-600 fill-current"
                    />
                </Link>

                <nav class="space-x-4">
                    <NavLink
                        :href="route('home')"
                        :active="route().current('home')"
                    >
                        Služby
                    </NavLink>

                    <NavLink
                        :href="route('contact.create')"
                        :active="route().current('contact.create')"
                    >
                        Kontakt
                    </NavLink>

                    <NavLink
                        :href="route('dashboard')"
                        :active="route().current('dashboard')"
                    >
                        Administrace
                    </NavLink>
                </nav>
            </div>
        </header>

        <!-- Page Content -->
        <main class="flex flex-col items-center flex-grow px-6 py-8">
            <div class="w-full max-w-2xl p-6 bg-white rounded-lg shadow-md">
                <slot />
            </div>
        </main>

        <Footer />
    </div>
</template>
