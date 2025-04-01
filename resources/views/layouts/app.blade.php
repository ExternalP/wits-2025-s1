@props([
    // 'mainClass' => '',
    // 'headerClass' => 'bg-white shadow',
    'headerClass' => 'bg-zinc-800 text-zinc-200',
    'mainClass' => 'container grow my-8 mx-auto py-8 justify-self-center shadow shadow-black/25 w-full px-6 bg-white overflow-hidden rounded-lg',
])

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
        <div class="min-h-screen bg-gray-100 mb-1">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="{{ $headerClass }}">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="{{ $mainClass }}">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
