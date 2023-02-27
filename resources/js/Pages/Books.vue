<template>
    <div>

        <Head title="Books List" />
        <AuthenticatedLayout>
            <template #header>
                <h1 class="font-semibold text-xl text-gray-800 leading-tight text-center">
                    Books List
                </h1>
            </template>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                            role="alert" v-if="$page.props.flash.message">
                            <div class="flex">
                                <div>
                                    <p class="text-sm">{{ $page.props.flash.message }}</p>
                                </div>
                            </div>
                        </div>

                        <button @click="openForm()"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Create New
                            Book</button>

                        <!-- table -->
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <div class="pb-4 bg-white dark:bg-gray-900 flex items-end">
                                <label for="table-search" class="sr-only">Search</label>
                                <div class="relative mt-1">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <input v-model="search" type="text" id="table-search"
                                        class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Search for items">
                                </div>
                            </div>
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr class="bg-gray-100">
                                        <th class="px-4 py-2 w-8">No.</th>
                                        <th class="px-4 py-2">Action</th>
                                        <th class="px-4 py-2">Title- Description</th>
                                        <th class="px-4 py-2">Author</th>
                                        <th class="px-4 py-2">Genre</th>
                                        <th class="px-4 py-2">ISBN</th>
                                        <th class="px-4 py-2">Image</th>
                                        <th class="px-4 py-2">Published by/On</th>

                                    </tr>
                                </thead>
                                <tbody class="overflow-x-auto">
                                    <tr v-for="item in rows" v-bind:key="item.index">
                                        <td class="px-4 py-2 border">{{  item.id  }}</td>
                                        <td class="border px-4 py-2">
                                            <button @click="openForm(item)"
                                                class="bg-blue-500 hover:bg-blue-700 text-xs font-medium text-white font-bold py-2 px-4 rounded">Edit</button>
                                            <button @click="deleteItem(item)"
                                                class="bg-red-500 hover:bg-red-700 text-xs font-medium text-white font-bold py-2 px-4 rounded">Delete</button>
                                        </td>
                                        <td  class="px-4 py-2 border">{{ item.title + ' -Description: ' + item.description }}</td>
                                        <td class="px-4 py-2 border">{{ item.author }}</td>
                                        <td  class="px-4 py-2 border">{{ item.genre }}</td>
                                        <td class="px-4 py-2 border">{{ item.isbn }}</td>
                                        <td  class="px-4 py-2 border "><img :src="item.image" width="150" height="150" />
                                        </td>
                                        <td  class="px-4 py-2 border">{{ item.publisher + '-' + item.published }}</td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <pagination :links="data.links"></pagination>
                        <book-form :isOpen="isFormOpen" :isEdit="isFormEdit" :form="formObject" @formsave="saveItem"
                            @formclose="closeModal"></book-form>
                    </div>
                </div>
            </div>

        </AuthenticatedLayout>
    </div>
</template>

<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
const defaultFormObject = {
    title: null, author: null, genre: null, isbn: null, image: null, published: null, publisher: null,
};
import Pagination from './../Components/pagination.vue';
import BookForm from './../Components/Book/form.vue';
export default {
    props: ['data'],
    components: {
        AuthenticatedLayout,
        Pagination,
        BookForm
    },
    data() {
        return {
            search: null,
            items: [],
            isFormOpen: false,
            isFormEdit: false,
            formObject: defaultFormObject
        }
    },
    methods: {
        saveItem(item) {
            let url = '/books';
            if (item.id) {
                url = '/books/' + item.id;
                item._method = 'PUT';
            }
            this.$inertia.post(url, item, {
                onError: () => {
                },
                onSuccess: () => {
                    this.closeModal();
                }
            });
        },
        closeModal() {
            this.isFormOpen = false;
        },
        openForm(item) {
            this.isFormOpen = true;
            this.isFormEdit = !!item;
            this.formObject = item ? item : defaultFormObject;
            this.$page.props.errors = {};
        },
        deleteItem(item) {
            if (window.confirm('are you sure?')) {
                this.$inertia.post('/books/' + item.id, {
                    _method: 'DELETE'
                });
            }
        }
    },
    computed: {
       
        rows () {
      if (!this.data.data.length) {
        return []
      }
      
      return this.data.data.filter(item => {
        let props = (this.search ) ? [item['title']+item['author']+item['genre']+item['isbn']+item['published']+item['publisher']] : Object.values(item)
        
        
        return props.some(prop => !this.search || ((typeof prop === 'string') ? prop.includes(this.search) : prop.toString(10).includes(this.search)))
      })
    }
    }
};
</script>