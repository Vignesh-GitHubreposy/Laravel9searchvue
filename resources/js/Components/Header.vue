<template>
      <header class="w-full items-top mb-4 ">
        <nav class=" bg-white border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800">
            <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                <a href="/" class="flex items-center">
                    <img src="/logo.svg" class="mr-3 h-10 sm:h-30" alt="BookSearch Logo" />
                    <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">BookSearch</span>
                </a>
               <slot />
            </div>
        </nav>
    </header>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';

export default {
    
    

}
</script>

<style>

</style>