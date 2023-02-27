<template>
    <div class=" justify-center relative items-center py-5 px-5">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
            <div class="w-full md:w-full">
                <form class="flex items-center" method="post" name="search">
                    <label for="simple-search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input v-model="search" type="text" id="simple-search"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Search books by title, author, isbn, published, publisher here....">
                    </div>
                </form>
            </div>

        </div>
    </div>
    <div class="flex justify-center mt-2 p-2 bg-white">
        <pagination :links="data.links"></pagination>
    </div>
    <div class="flex flex-wrap justify-center">
        <div v-for="res in rows" v-bind:key="res.index">
            <div v-if="!!res">
                <a href="#"
                    class="flex flex-col items-center mt-2 m-2  bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 focus:bg-gray-100">
                    <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
                        :src="res.image" :id="res.key" alt="">
                    <div class="flex flex-col justify-between px-4 leading-normal font-sans">
                        <h5 class="mb-2 text-xl font-bold tracking- text-blue-600 dark:text-white">
                            {{ res.title }}
                        </h5>
                        <div class="flex flex-wrap border-b border-slate-200 my-2">
                            <h1 class="flex-auto text-xs text-slate-900">
                                by {{ res.author }}
                            </h1>

                            <div class="text-xs text-slate-400">
                                Genre: {{ res.genre }}
                            </div>
                        </div>
                        <div class="flex flex-wrap text-sm my-2">
                            <button class="flex-auto h-8 px-3 font-semibold rounded-full bg-blue-600 text-white"
                                type="submit">
                                ISBN: {{ res.isbn }}
                            </button>
                        </div>

                        <p class=" text-xs text-slate-500 dark:text-gray-400">{{ res.description }}</p>
                        <div class="flex flex-wrap border-t border-slate-200 my-2 pt-2">
                            <p class="text-sm flex-auto text-slate-400">Publisher: {{ res.publisher }}</p>
                            <p class="text-sm text-slate-400">Published On: {{ res.published }}</p>
                        </div>

                    </div>
                </a>
            </div>
            <div v-else>
                <div class="block overflow-hidden bg-white shadow rounded-lg my-4 container">
                    <div class="px-4 py-5 sm:px-6">
                        <h2>No Match found .....</h2>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-center mt-2 p-2 bg-white">
        <pagination :links="data.links"></pagination>
    </div>
</template>

<script>
import Pagination from '../pagination.vue';
export default {
    props: ['data'],

    data() {
        return {
            search: null,
            items: [],
        }
    },
    components: {
        Pagination,
    },
    computed: {

        rows() {
            if (!this.data.data.length) {
                return []
            }

            return this.data.data.filter(item => {
                let props = (this.search) ? [item['title'] + item['author'] + item['genre'] + item['isbn'] + item['published'] + item['publisher']] : Object.values(item)


                return props.some(prop => !this.search || ((typeof prop === 'string') ? prop.includes(this.search) : prop.toString(10).includes(this.search)))
            })
        }
    }
}
</script>

<style></style>