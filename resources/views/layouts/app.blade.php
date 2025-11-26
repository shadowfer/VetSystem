<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:300,400,500,600,700,800&display=swap" rel="stylesheet" />
        <script src="https://unpkg.com/@phosphor-icons/web"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            body { font-family: 'Plus Jakarta Sans', sans-serif; }
            [x-cloak] { display: none !important; }
        </style>
    </head>
    <body class="h-full bg-gray-50 antialiased">
        <div x-data="{ sidebarOpen: false }" class="flex h-full">
            <!-- Sidebar for desktop -->
            <div class="hidden md:flex md:w-64 md:flex-col">
                @include('layouts.navigation')
            </div>

            <!-- Mobile sidebar -->
            <div x-show="sidebarOpen" @click="sidebarOpen = false" x-cloak class="fixed inset-0 z-40 bg-gray-900/50 backdrop-blur-sm md:hidden"></div>
            
            <div x-show="sidebarOpen" x-cloak class="fixed inset-y-0 left-0 z-50 w-64 bg-white md:hidden shadow-2xl" 
                x-transition:enter="transition ease-out duration-300" 
                x-transition:enter-start="-translate-x-full" 
                x-transition:enter-end="translate-x-0" 
                x-transition:leave="transition ease-in duration-300" 
                x-transition:leave-start="translate-x-0" 
                x-transition:leave-end="-translate-x-full">
                @include('layouts.navigation')
            </div>

            <!-- Main content -->
            <div class="flex flex-col flex-1 w-0 overflow-hidden">
                <!-- Top bar for mobile -->
                <div class="relative z-10 flex flex-shrink-0 h-16 bg-white border-b border-gray-200 shadow-sm md:hidden">
                    <button @click="sidebarOpen = true" class="px-4 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-emerald-500">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                    <div class="flex items-center flex-1 px-4">
                        <span class="text-lg font-bold text-emerald-800">VetSystem</span>
                    </div>
                </div>

                <!-- Main content area -->
                <main class="relative flex-1 overflow-y-auto focus:outline-none bg-gray-50">
                    @isset($header)
                    <div class="bg-white border-b border-gray-200 shadow-sm sticky top-0 z-10">
                        <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </div>
                    @endisset

                    <div class="px-4 py-8 mx-auto max-w-7xl sm:px-6 lg:px-8">
                        {{ $slot }}
                    </div>
                </main>
            </div>
        </div>
    </body>
</html>
