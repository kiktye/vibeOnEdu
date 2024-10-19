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


    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />

</head>

<body class="font-sans antialiased">
    {{--        <div class="min-h-screen bg-gray-100 dark:bg-gray-900"> --}}
    {{--            @include('layouts.navigation') --}}

    <!-- Scripts -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="font-sans antialiased">
        {{--        <div class="min-h-screen bg-gray-100 dark:bg-gray-900"> --}}
        {{--            @include('layouts.navigation') --}}

        {{--            <!-- Page Heading --> --}}
        {{--            @if (isset($header)) --}}
        {{--                <header class="bg-white dark:bg-gray-800 shadow"> --}}
        {{--                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8"> --}}
        {{--                        {{ $header }} --}}
        {{--                    </div> --}}
        {{--                </header> --}}
        {{--            @endif --}}

        {{--            <!-- Page Content --> --}}
        {{--            <main> --}}
        {{--                {{ $slot }} --}}
        {{--            </main> --}}
        {{--        </div> --}}
    </body>

    <<<<<<< HEAD======={{--            <!-- Page Content --> --}} {{--            <main> --}} {{--                {{ $slot }} --}} {{--            </main> --}}
        {{--        </div> --}} <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

</body>
>>>>>>> 53ea72a9b6229834c95c66124f165bc13512e79d

</html>
