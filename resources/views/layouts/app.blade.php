<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'ClientManager') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset
            <div class="absolute right-0 top-0 py-6 px-4 sm:px-6 lg:px-8 z-10 ">
            @if (session('sucesso'))
                <div 
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 4000)"
                    class="mb-4 p-4 bg-zinc-900 border text-green-600 rounded-md opacity-90"
                >
                    {{ session('sucesso') }}
                </div>
            @endif

            @if (session('erro'))
                <div 
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 4000)"
                    class="mb-4 p-4 bg-zinc-900 border text-red-600 rounded-md opacity-90"
                >
                    {{ session('erro') }}
                </div>
            @endif    
            </div>
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>        
        </div>
    </body>
</html>
