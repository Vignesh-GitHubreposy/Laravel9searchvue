<template>

    <div class="overflow-hidden  bg-white shadow rounded-lg container">

        <div class="border-t border-gray-200 flex justify-center">

            <dl class="block">
                <div class="flex justify-center items-center my-4">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 block font-weight-500">Advance Search
                    </h3>

                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-6">
                    <div class="relative">
                        <input type="text" id="floating_outlined"
                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " />
                        <label for="floating_outlined"
                            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Book
                            Title</label>
                    </div>
                    <dt class="text-sm font-medium text-gray-500">Book Title</dt>
                    <dd class="mt-1 text-sm text-gray-900  sm:my-1">
                        <input type="text" name="title" id="title"
                            class="block w-full rounded-md border-gray-300 pl-7 pr-12 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            placeholder="Enter Title here...">
                    </dd>
                    <dt class="text-sm font-medium text-gray-500">ISBN</dt>
                    <dd class="mt-1 text-sm text-gray-900  sm:my-1">
                        <input type="number" name="isbn" id="isbn" min="1111111111111" max='9999999999999'
                            class="block w-full rounded-md border-gray-300 pl-7 pr-12 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            placeholder="">
                    </dd>
                </div>

                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Author</dt>
                    <dd class="mt-1 text-sm text-gray-900  sm:my-1">
                        <select 
                        v-model="author"
                        :id="author" 
                        :name="author"
                        v-for="item as authorlist"
                            class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500">
                            <option value="" selected disabled> Select Author</option>
                         
                            <option value="{{ item.author }}">{{ item.author }}</option>
                          

                        </select>
                    </dd>
                    <dt class="text-sm font-medium text-gray-500">Genre</dt>
                    <dd class="mt-1 text-sm text-gray-900  sm:my-1"><select id="genre" name="genre"
                            class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500">
                            <option value="" selected disabled> Select Genre</option>
                            @foreach ($book->genre() as $genre)
                            <option value="{{ $genre->genre }}">{{ $genre -> genre }}</option>
                            @endforeach
                        </select>
                    </dd>
                </div>

                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Published On</dt>
                    <dd class="mt-1 text-sm text-gray-900  sm:my-1">

                        <input type="date" name="published" id="published"
                            class="block w-full rounded-md border-gray-300 pl-7 pr-12 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            placeholder="">
                    </dd>
                    <dt class="text-sm font-medium text-gray-500"> </dt>
                    <dd class="mt-1 text-sm text-gray-900  sm:my-1">
                        <button name="search" id="search"
                            class=" w-full pointer-events-auto rounded bg-indigo-600 py-2 px-3 text-[0.8125rem] font-semibold leading-5 text-white hover:bg-indigo-500"
                            type="button">Filter Books Now</button>
                    </dd>

                </div>


            </dl>

        </div>
    </div>
</template>

<script>
export default {
    data:{
    authorlist:[],
    genre:[],
    }

}
</script>

<style></style>