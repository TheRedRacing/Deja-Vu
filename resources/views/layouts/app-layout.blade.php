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

            <div>
                @if (session('lastUpdated') !== null)
                <p class="text-sm text-white">Last updated: {{ session('lastUpdated') }}</p>
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