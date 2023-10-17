<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Rocket league</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased flex flex-col min-h-screen relative">
    <section class="bg-zinc-900 w-full">
        <div class="flex items-center justify-between container mx-auto py-4">
            <a href="/" class="inline-flex items-end gap-2">
                <h1 class="text-xl font-bold text-white">Rocket League</h1>
                <span class="text-xs text-gray-300">V 1.3</span>
            </a>

            <div class="flex items-center gap-4">
                @if (session('lastUpdated') !== null)
                <p class="text-sm text-white">Last updated at {{ date('H:i:s', strtotime(session('lastUpdated'))) }}</p>
                <x-popup>
                    <x-slot name="trigger">
                        <button type="button" class="h-9 w-9 bg-zinc-700 inline-flex items-center justify-center text-zinc-400 rounded-full hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                            </svg>
                        </button>
                    </x-slot>
                </x-popup>
                @endif
            </div>
        </div>
    </section>
    <div class="absolute top-16 right-0">
        @if(session('status'))
        <x-alert />
        @endif
    </div>

    <div class="flex-1 flex flex-col">
        {{ $slot }}
    </div>
</body>

</html>