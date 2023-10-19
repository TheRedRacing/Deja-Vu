<x-app-layout>
    <div class="flex-1 bg-zinc-900 relative">
        <div class="relative isolate">
            <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
                <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-20 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
            </div>
            <div class="py-24">
                <div class="mx-auto container px-6 lg:px-8">
                    <div class="mx-auto max-w-4xl text-center">
                        <h1 class="text-2xl font-bold tracking-tight text-white sm:text-4xl">DejaVu is the answer!</h1>
                        <p class="mt-6 text-lg leading-8 text-gray-300">Do you ever wonder, 'Have I played against them before?' DejaVu holds the key to that question!</p>
                        <p class="mt-6 text-lg leading-8 text-gray-300">Introducing <a class="text-blue-500 hover:text-blue-400 underline" href="https://bakkesplugins.com/plugins/view/55">DejaVu</a>, the plugin available on BakkesMod that keeps a record of your previous encounters with other players, so you can answer that question with complete confidence.</p>
                        <p class="mt-6 text-lg leading-8 text-gray-300">But that's not all! Thanks to our exclusive website, specially designed for the BakkesMod DejaVu plugin, you can now dive deep into your game statistics and discover which teammate has been your most victorious partner.</p>
                        <p class="mt-6 text-lg leading-8 text-gray-300">No more doubts—improve your game and strengthen your team bonds now. Join DejaVu and immerse yourself in the exciting world of game data!</p>
                        <div class="mt-10 flex items-center justify-center gap-x-6">
                            @if (session('lastUpdated') !== null)
                            <a href="/data" type="button" class="rounded-md bg-indigo-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-400">
                                <span>Get started</span>
                                <span class="sr-only"> with DejaVu</span>
                            </a>
                            @else
                            <x-popup setOpen="{{ ($errors->any()) ? 'true' : '' }}">
                                <x-slot name="trigger">
                                    <button type="button" class="rounded-md bg-indigo-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-400">
                                        <span>Get started</span>
                                        <span class="sr-only"> with DejaVu</span>
                                    </button>
                                </x-slot>
                            </x-popup>
                            @endif
                            <a href="https://github.com/TheRedRacing/Deja-Vu" target="_blank" class="relative text-sm font-semibold leading-6 text-white hover:underline group">View on GitHub <span class="absolute -right-4 transition-transform duration-300 group-hover:translate-x-2" aria-hidden="true">→</span></a>
                        </div>
                    </div>
                    <img src="https://tailwindui.com/img/component-images/dark-project-app-screenshot.png" alt="App screenshot" width="2432" height="1442" class="mt-16 rounded-md bg-white/5 shadow-2xl ring-1 ring-white/10 sm:mt-24">
                </div>
            </div>
            <div class="absolute inset-x-0 top-[calc(100vh-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100vh-30rem)]" aria-hidden="true">
                <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-20 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
            </div>
        </div>
    </div>
</x-app-layout>