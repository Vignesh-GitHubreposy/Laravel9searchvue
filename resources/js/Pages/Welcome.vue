<template>
    <div>

        <Head title="Welcome" />
        <Header >
            <div class=" flex justify-center sm:items-center sm:pt-0">
                <div v-if="canLogin" class="hidden  top-0 right-0 px-6 py-4 sm:block">
                    <Link v-if="$page.props.auth.user" :href="route('dashboard')"
                        class="text-sm text-gray-700 dark:text-gray-500 ">Dashboard</Link>
                    <template v-else>
                        <Link :href="route('login')" class="text-sm text-gray-700 dark:text-gray-500 ">Log in
                        </Link>
                        <Link v-if="canRegister" :href="route('register')"
                            class="ml-4 text-sm text-gray-700 dark:text-gray-500 ">Register</Link>
                    </template>
                </div>
            </div>
        </Header>
        <SearchForm v-bind:data="data" />
    </div>
</template>
<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import SearchForm from '@/Components/Book/FilterForm.vue';
// import Advform from '@/Components/Book/AdvanceBookFilter.vue';
import Header from '@/Components/Header.vue';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    authorlist: Array,
    data: Array,
});

</script>

<style>
body {
    font-family: 'Nunito', sans-serif;
    background: url('124383.jpg');
    object-fit: 'fit';
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
}</style>