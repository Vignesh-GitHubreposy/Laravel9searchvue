<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel9 books search </title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
     <script src="https://code.jquery.com/jquery-3.6.3.js"></script>

    @vite(['resources/css/app.css'])
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
</head>
@inject('book', 'App\Http\Controllers\SearchBookController')

<body class="antialiased">
    <header>
        <nav class="bg-white border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800">
            <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                <a href="https://flowbite.com" class="flex items-center">
                    <img src="/logo.svg" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo" />
                    <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">BookSearch</span>
                </a>
                <div class="flex items-center lg:order-2">
                    @if (Route::has('login'))

                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}"
                                class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Log
                                in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Register</a>
                            @endif
                        @endauth

                    @endif


                </div>

            </div>
        </nav>
    </header>



    <div class=" justify-center relative items-center py-5 px-5">

        <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
            <div class="w-full md:w-1/2">
                <form class="flex items-center" method="post" name="search">
                    @csrf
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
                        <input type="text" id="simple-search"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Search books here...." value="" required="">
                    </div>
                </form>
            </div>
            <div
                class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                <button type="button"
                    class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                    <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                    </svg>
                    Add product
                </button>
                <div class="flex items-center space-x-3 w-full md:w-auto">
                    <button id="actionsDropdownButton" data-dropdown-toggle="actionsDropdown"
                        class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                        type="button">
                        <svg class="-ml-1 mr-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                        </svg>
                        Actions
                    </button>
                    <div id="actionsDropdown"
                        class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                     
                        <div class="py-1">
                            <a href="#"
                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete
                                all</a>
                        </div>
                    </div>
                    <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown"
                        class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                        type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="h-4 w-4 mr-2 text-gray-400"
                            viewbox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"
                                clip-rule="evenodd" />
                        </svg>
                        Filter
                        <svg class="-mr-1 ml-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                        </svg>
                    </button>
                    <div id="filterDropdown" class="z-10 hidden w-48 p-3 bg-white rounded-lg shadow dark:bg-gray-700">
                        <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">Choose brand</h6>
                        
                  
                    </div>
                </div>
            </div>
        </div>

        <div class="overflow-hidden  bg-white shadow rounded-lg container">

            <div class="border-t border-gray-200 flex justify-center">

                <dl class="block">
                    <div class="flex justify-center items-center my-4">
                        <h3 class="text-lg font-medium leading-6 text-gray-900 block font-weight-500">Advance Search
                        </h3>

                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-6">
                        {{-- <div class="relative">
                            <input type="text" id="floating_outlined"
                                class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " />
                            <label for="floating_outlined"
                                class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Book
                                Title</label>
                        </div> --}}
                        <dt class="text-sm font-medium text-gray-500">Book Title</dt>
                        <dd class="mt-1 text-sm text-gray-900  sm:my-1">
                            <input type="text" name="title" id="title"
                                class="block w-full rounded-md border-gray-300 pl-7 pr-12 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                placeholder="Enter Title here...">
                        </dd>
                        <dt class="text-sm font-medium text-gray-500">ISBN</dt>
                        <dd class="mt-1 text-sm text-gray-900  sm:my-1">
                            <input type="number" name="isbn" id="isbn" min="1111111111111"
                                max='9999999999999'
                                class="block w-full rounded-md border-gray-300 pl-7 pr-12 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                placeholder="">
                        </dd>
                    </div>

                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-4 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Author</dt>
                        <dd class="mt-1 text-sm text-gray-900  sm:my-1"><select id="author" name="author"
                                class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500">
                                <option value="" selected disabled> Select Author</option>
                                @foreach ($book->authorlist() as $author)
                                    <option value="{{ $author->author }}">{{ $author->author }}</option>
                                @endforeach

                            </select></dd>
                        <dt class="text-sm font-medium text-gray-500">Genre</dt>
                        <dd class="mt-1 text-sm text-gray-900  sm:my-1"><select id="genre" name="genre"
                                class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500">
                                <option value="" selected disabled> Select Genre</option>
                                @foreach ($book->genre() as $genre)
                                    <option value="{{ $genre->genre }}">{{ $genre->genre }}</option>
                                @endforeach
                            </select></dd>
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
        <div class="flex flex-wrap justify-center">
               @forelse ($result as $res)
            <a href="#"
                class="flex flex-col items-center mt-2 mr-2  bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
                    src="{{ $res->image }}" id="{{ $res->key }}" alt="">
                <div class="flex flex-col justify-between p-4 leading-normal font-sans">
                    <h5 class="mb-2 text-xl font-bold tracking- text-violet-600 dark:text-white">{{ $res->title }}
                    </h5>
                    <div class="flex flex-wrap border-b border-slate-200 my-2">
                        <h1 class="flex-auto font-medium text-slate-900">
                            by {{ $res->author }}
                        </h1>

                        <div class="text-sm font-medium text-slate-400">
                            Genre: {{ $res->genre }}
                        </div>
                    </div>
                    <div class="flex flex-wrap font-medium text-sm my-2 ">
                        <button class="flex-auto h-10 px-4 font-semibold rounded-full bg-violet-600 text-white" type="submit">
                            ISBN: {{ $res->isbn }}
                        </button>

                        <button class="h-10 px-6 font-semibold rounded-full bg-violet-600 text-white" type="submit">
                            Read More
                        </button>

                    </div>

                    <p class=" text-sm text-slate-500 dark:text-gray-400">{{ $res->description }}</p>

                </div>
            </a>

        @empty
            <div class="block overflow-hidden bg-white shadow rounded-lg my-4 container">
                <div class="px-4 py-5 sm:px-6">

                    <h2>No Match found .....</h2>

                </div>

            </div>
        @endforelse
        </div>
<div class="justify-center mt-2 p-2 bg-white">
{{ $result->onEachSide(5)->links() }}
</div>
     


 @vite(['resources/js/app.js'])
<script>
    $('#floating_outlined').blur(function (e) { 
        e.preventDefault();
        var parent=$('#floating_outlined').shadowRoot;
        var query=$(parent).children(1).text();
        // var query=$('#floating_outlined').children(2).text();
        //var query=$('#floating_outlined::shadow #placeholder').siblings().text();
        //var query=$('#floating_outlined div#placeholder').siblings().text();
        //$query=$('#floating_outlined').text();
        console.log(parent+'x:'+query);
    });
    
</script>
</body>

</html>
