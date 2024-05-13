<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="md:flex flex-col md:flex-row md:min-h-max w-[15%]">
        <div class="flex flex-col w-full h-screen md:w-64 text-gray-700 bg-third-blue flex-shrink-0">
            <div class="flex-shrink-0 px-8 py-4 flex flex-row items-center justify-between">
                <a href="#"
                    class="text-lg font-semibold tracking-widest text-white uppercase rounded-lg focus:outline-none focus:shadow-outline">Bakaran
                    Project</a>
            </div>
            <nav class="flex-grow md:block px-4 pb-4 md:pb-0 md:overflow-y-auto">
                <div class="flex flex-col justify-center h-full">
                    <a class="block px-4 py-2 mt-2 text-sm font-semibold text-white rounded-lg dark-mode:focus:bg-gray-600 hover:text-white focus:text-white hover:bg-gray-500 focus:bg-gray-500 focus:outline-none focus:shadow-outline"
                        href="#">Insight</a>
                    <a class="block px-4 py-2 mt-2 text-sm font-semibold text-white bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:bg-gray-600 hover:text-white focus:text-white hover:bg-gray-500 focus:bg-gray-500 focus:outline-none focus:shadow-outline"
                        href="#">Posts</a>
                    <a class="block px-4 py-2 mt-2 text-sm font-semibold text-white bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:bg-gray-600 hover:text-white focus:text-white hover:bg-gray-500 focus:bg-gray-500 focus:outline-none focus:shadow-outline"
                        href="#">New Project</a>
                    <a class="block px-4 py-2 mt-2 text-sm font-semibold text-white bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:bg-gray-600 hover:text-white focus:text-white hover:bg-gray-500 focus:bg-gray-500 focus:outline-none focus:shadow-outline"
                        href="#">Event</a>
                </div>
            </nav>
        </div>
    </div>
</body>

</html>
