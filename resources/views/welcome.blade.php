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
        /* body {
            font-family: 'Nunito', sans-serif;
            background: url('124383.jpg');
            object-fit: 'fit';
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        } */
    </style>
</head>
@inject('book', 'App\Http\Controllers\SearchBookController')

<body class="antialiased">
    <div id="app">

    </div>
    @vite(['resources/js/app.js'])
    <script></script>
</body>

</html>
