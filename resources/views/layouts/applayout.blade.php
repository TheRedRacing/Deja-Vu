<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Rocket league</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Icon -->
    <link rel="icon" href="{{ asset('dejavu.ico') }}" type="image/x-icon" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased flex flex-col min-h-screen relative">
    <section class="bg-zinc-900 w-full">
        <div class="flex items-center justify-between container mx-auto py-4">
            <a href="/" class="inline-flex items-end gap-2">
                <h1 class="text-xl font-bold text-white">Rocket League</h1>
                <span class="text-xs text-gray-300">V 1.5</span>
            </a>

            <div class="flex items-center gap-4">
                @if (request()->is('data'))
                <x-dropdown>
                    <x-slot name="trigger">
                        <button type="button" class="inline-flex items-center justify-center rounded-full bg-zinc-700 text-zinc-400 hover:text-white">
                            <svg class="h-6 w-6 mx-2" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>

                            <div class="h-9 w-9 rounded-full bg-zinc-600 flex items-center justify-center">
                                <span class="h-8 w-8 rounded-full bg-zinc-500 flex items-center justify-center text-zinc-400 text-sm font-semibold uppercase">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                        <path d="M10 8a3 3 0 100-6 3 3 0 000 6zM3.465 14.493a1.23 1.23 0 00.41 1.412A9.957 9.957 0 0010 18c2.31 0 4.438-.784 6.131-2.1.43-.333.604-.903.408-1.41a7.002 7.002 0 00-13.074.003z" />
                                    </svg>
                                </span>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="divide-y divide-zinc-200 px-2">
                            <div class="py-2">
                                <a href="https://github.com/TheRedRacing/Deja-Vu/issues" target="_blank" class="whitespace-nowrap flex items-center gap-2 text-zinc-700 hover:bg-zinc-100 rounded-md p-2 text-sm">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 12.75c1.148 0 2.278.08 3.383.237 1.037.146 1.866.966 1.866 2.013 0 3.728-2.35 6.75-5.25 6.75S6.75 18.728 6.75 15c0-1.046.83-1.867 1.866-2.013A24.204 24.204 0 0112 12.75zm0 0c2.883 0 5.647.508 8.207 1.44a23.91 23.91 0 01-1.152 6.06M12 12.75c-2.883 0-5.647.508-8.208 1.44.125 2.104.52 4.136 1.153 6.06M12 12.75a2.25 2.25 0 002.248-2.354M12 12.75a2.25 2.25 0 01-2.248-2.354M12 8.25c.995 0 1.971-.08 2.922-.236.403-.066.74-.358.795-.762a3.778 3.778 0 00-.399-2.25M12 8.25c-.995 0-1.97-.08-2.922-.236-.402-.066-.74-.358-.795-.762a3.734 3.734 0 01.4-2.253M12 8.25a2.25 2.25 0 00-2.248 2.146M12 8.25a2.25 2.25 0 012.248 2.146M8.683 5a6.032 6.032 0 01-1.155-1.002c.07-.63.27-1.222.574-1.747m.581 2.749A3.75 3.75 0 0115.318 5m0 0c.427-.283.815-.62 1.155-.999a4.471 4.471 0 00-.575-1.752M4.921 6a24.048 24.048 0 00-.392 3.314c1.668.546 3.416.914 5.223 1.082M19.08 6c.205 1.08.337 2.187.392 3.314a23.882 23.882 0 01-5.223 1.082" />
                                        </svg>
                                    </span>
                                    <span>Submit bug</span>
                                </a>
                                <a href="https://msickenberg.ch" target="_blank" class="whitespace-nowrap flex items-center gap-2 text-zinc-700 hover:bg-zinc-100 rounded-md p-2 text-sm">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                        </svg>
                                    </span>
                                    <span>About me</span>
                                </a>
                                <div class="whitespace-nowrap text-zinc-700 hover:bg-zinc-100 rounded-md p-2 text-sm cursor-pointer">
                                    <x-popup setOpen="{{ ($errors->any()) ? 'true' : '' }}">
                                        <div class="flex items-center gap-2">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                                                </svg>
                                            </span>
                                            <div class="flex gap-1">
                                                <span>Last update :</span>
                                                <span>{{ date('H:i:s', strtotime(session('lastUpdated'))) }}</span>
                                            </div>
                                        </div>
                                    </x-popup>
                                </div>
                            </div>
                            <div class="py-2">
                                <a href="/delete" class="whitespace-nowrap flex items-center gap-2 text-red-500 hover:bg-zinc-100 rounded-md p-2 text-sm">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </span>
                                    <span>Delete</span>
                                </a>
                            </div>
                        </div>
                    </x-slot>
                </x-dropdown>
                @endif
            </div>
        </div>
    </section>
    <div class="relative">
        @if(session('status'))
        <x-alert />
        @endif
    </div>

    <div class="flex-1 flex flex-col">
        {{ $slot }}
    </div>
</body>

</html>