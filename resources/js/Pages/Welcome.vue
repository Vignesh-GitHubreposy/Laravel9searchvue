<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Head title="Welcome" />

    <div class="relative flex items-top justify-center min-h-screen sm:items-center sm:pt-0">
        <div v-if="canLogin" class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            <Link v-if="$page.props.user" :href="route('dashboard')" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</Link>

            <template v-else>
                <Link :href="route('login')" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</Link>

                <Link v-if="canRegister" :href="route('register')" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</Link>
            </template>
        </div>

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 justify-center w-full">            

            <div class="mt-8 bg-transparent dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <img class="" src="/logo.svg" alt="logo" width="100%" height="100" >
                <input classs="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="search" type="text" value="">
            </div>

        </div>
    </div>
</template>
<style>
 body {
            font-family: 'Nunito', sans-serif;
            background: url('124383.jpg');
            object-fit: 'fit';
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
</style>