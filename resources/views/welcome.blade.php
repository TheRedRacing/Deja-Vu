<x-app-layout>
    <section class="container mx-auto py-6 mb-20">
        <div>
            <h3 class="text-xl font-semibold leading-6 text-gray-900">Statistics</h3>
            <p class="mt-2 text-base text-gray-500">{{ $stats->players }} unique players were met in {{ $stats->party }} games.</p>

            <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-4">
                <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
                    <dt class="truncate text-sm font-medium text-gray-500">Number of victory</dt>
                    <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">{{ $stats->victory }}</dd>
                </div>
                <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
                    <dt class="truncate text-sm font-medium text-gray-500">Number of lose</dt>
                    <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">{{ $stats->lose }}</dd>
                </div>
                <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
                    <dt class="truncate text-sm font-medium text-gray-500">Victory rate</dt>
                    <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">{{ $stats->winrate }}%</dd>
                </div>
                <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
                    <dt class="truncate text-sm font-medium text-gray-500">Number of not played</dt>
                    <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">{{ $stats->noData }}</dd>
                </div>
            </dl>
        </div>

        <div class="mt-4 flex justify-end items-center gap-2">
            <form action="{{ route('store') }}" method="post" class="flex gap-2 w-1/2">
                @csrf
                <div class="flex-1 relative" x-data="{ open: false }" @click.away="open = false">
                    <button type="button" x-on:click="open = !open" class="w-full cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6" aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label">
                        <span class="block whitespace-nowrap">
                            @if($filter['mode'] == "all")
                            Choose game mode
                            @else
                            {{ $gameMode[$filter['mode']] }}
                            @endif
                        </span>
                        <span class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
                            <svg viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    </button>
                    <div :class="{'hidden': !open, 'flex': open}" class="hidden absolute z-10 flex-col mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm scrollbar-thin scrollbar-track-zinc-100 scrollbar-thumb-zinc-300">
                        <label for="all" class="inline-flex items-center gap-2 py-2 pl-3 pr-9 text-gray-900 select-none hover:bg-zinc-50">
                            <input type="radio" name="gameMode" id="all" value="all" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:outline-none" @if($filter['mode']=="all" ) ? checked : '' @endif>
                            <span class="font-normal block whitespace-nowrap">All</span>
                        </label>
                        @foreach ($gameMode as $key => $gm)
                        <label for="{{ $key }}" class="inline-flex items-center gap-2 py-2 pl-3 pr-9 text-gray-900 select-none hover:bg-zinc-50">
                            <input type="radio" name="gameMode" id="{{ $key }}" value="{{ $key }}" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:outline-none" @if($filter['mode']==$key) ? checked : '' @endif>
                            <span class="font-normal block whitespace-nowrap">{{ $gm }}</span>
                        </label>
                        @endforeach
                    </div>
                </div>
                <div>
                    <select id="number" name="number" class="block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <option value="all" @if ($filter['number']=="all" ) ? selected : '' @endif>All</option>
                        <option value="10" @if ($filter['number']==10) ? selected : '' @endif>10</option>
                        <option value="25" @if ($filter['number']==25) ? selected : '' @endif>25</option>
                        <option value="50" @if ($filter['number']==50) ? selected : '' @endif>50</option>
                        <option value="100" @if ($filter['number']==100) ? selected : '' @endif>100</option>
                        <option value="250" @if ($filter['number']==250) ? selected : '' @endif>250</option>
                        <option value="500" @if ($filter['number']==500) ? selected : '' @endif>500</option>
                        <option value="1000" @if ($filter['number']==1000) ? selected : '' @endif>1000</option>
                    </select>
                </div>
                <button type="submit" class="rounded-md bg-zinc-900 px-4 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-zinc-800">
                    Filter
                </button>
                <a href="/data" class="rounded-md bg-zinc-900 px-4 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-zinc-800">
                    Reset
                </a>
            </form>
        </div>
        <div class="mt-4 overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
            <table id="players" class="min-w-full divide-y divide-gray-300">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 align-baseline">
                            <button class="flex items-center gap-2 text-left text-sm font-semibold text-gray-900 align-baseline">
                                Username
                            </button>
                        </th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 align-baseline">
                            <button class="flex items-center gap-2 text-left text-sm font-semibold text-gray-900 align-baseline">
                                Meet count
                            </button>
                        </th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 align-baseline">Game mode</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                            Teammate
                            <div class="mt-2 flex gap-2 items-center">
                                <div class="whitespace-nowrap flex-1 inline-flex items-center gap-1 rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">
                                    Victory
                                </div>
                                <div class="whitespace-nowrap flex-1 inline-flex items-center gap-1 rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/10">
                                    Lose
                                </div>
                                <div class="whitespace-nowrap flex-1 inline-flex items-center gap-1 rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">
                                    Win Rate
                                </div>
                            </div>
                        </th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                            Opponent
                            <div class="mt-2 flex gap-2 items-center">
                                <div class="whitespace-nowrap flex-1 inline-flex items-center gap-1 rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">
                                    Victory
                                </div>
                                <div class="whitespace-nowrap flex-1 inline-flex items-center gap-1 rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/10">
                                    Lose
                                </div>
                                <div class="whitespace-nowrap flex-1 inline-flex items-center gap-1 rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">
                                    Win Rate
                                </div>
                            </div>
                        </th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 align-baseline">
                            <x-filter-button step="{{ ($filter['sortBy'] == 'timeMet' && $filter['sort'] == 'asc') ? 2 : (($filter['sortBy'] == 'timeMet' && $filter['sort'] == 'desc') ? 3 : 1) }}">
                                First Meet
                            </x-filter-button>
                        </th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 align-baseline">
                            <button class="flex items-center gap-2 text-left text-sm font-semibold text-gray-900 align-baseline">
                                Last Update
                            </button>
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white list">
                    @if (count($players) != 0)
                    @foreach ($players as $player)
                    <tr>
                        <td class="whitespace-nowrap px-3 py-4 text-sm font-medium text-gray-900">{{ $player['username'] }}</td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                            @if($filter['mode'] == 'all')
                            {{ $player['meetCount'] }}
                            @else
                            {{ $player['data'][$filter['mode']]['gamesPlayed'] }}
                            @endif
                        </td>
                        @if (isset($player['data']))
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                            <div class="flex flex-col gap-2">
                                @if ($filter['mode'] == 'all')
                                @foreach ($player['data'] as $gm => $data)
                                <span class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">{{ $gameMode[$gm] }}</span>
                                @endforeach
                                @else
                                <span class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">{{ $filter['mode'] }}</span>
                                @endif
                            </div>
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                            <div class="flex flex-col gap-2">
                                @foreach ($player['data'] as $d => $data)
                                @if ($filter['mode'] == 'all' || $filter['mode'] == $d)
                                <div class="flex gap-2 items-center">
                                    <div class="flex-1 inline-flex items-center gap-1 rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20 relative group">
                                        {{$data['with']['wins']}}
                                        <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                        </svg>
                                        <div class="opacity-0 absolute -top-8 left-1/2 -translate-x-1/2 pointer-events-auto group-hover:opacity-100 transition-opacity duration-150 inline-flex items-center rounded-md bg-zinc-800 px-2 py-1 text-xs font-medium text-white ring-1 ring-inset ring-zinc-800/10">
                                            <p class="text-xs">You have lost {{$data['with']['wins']}} game whit this player</p>
                                            <span class="absolute left-1/2 -translate-x-1/2 top-3 -z-10 block h-5 w-5 bg-zinc-800 rounded-sm rotate-45"></span>
                                        </div>
                                    </div>
                                    <div class="flex-1 inline-flex items-center gap-1 rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/10 relative group">
                                        {{$data['with']['losses']}}
                                        <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                        <div class="opacity-0 absolute -top-8 left-1/2 -translate-x-1/2 pointer-events-auto group-hover:opacity-100 transition-opacity duration-150 inline-flex items-center rounded-md bg-zinc-800 px-2 py-1 text-xs font-medium text-white ring-1 ring-inset ring-zinc-800/10">
                                            <p class="text-xs">You have lost {{$data['with']['losses']}} game whit this player</p>
                                            <span class="absolute left-1/2 -translate-x-1/2 top-3 -z-10 block h-5 w-5 bg-zinc-800 rounded-sm rotate-45"></span>
                                        </div>
                                    </div>
                                    <div class="flex-1 inline-flex items-center gap-1 rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">
                                        {{$data['with']['winrate']}} %
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                            <div class="flex flex-col gap-2">
                                @foreach ($player['data'] as $d => $data)
                                @if ($filter['mode'] == 'all' || $filter['mode'] == $d)
                                <div class="flex gap-2 items-center">
                                    <div class="flex-1 inline-flex items-center gap-1 rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20 relative group">
                                        {{$data['against']['wins']}}
                                        <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                        </svg>
                                        <div class="opacity-0 absolute -top-8 left-1/2 -translate-x-1/2 pointer-events-auto group-hover:opacity-100 transition-opacity duration-150 inline-flex items-center rounded-md bg-zinc-800 px-2 py-1 text-xs font-medium text-white ring-1 ring-inset ring-zinc-800/10">
                                            <p class="text-xs">You have won {{$data['against']['wins']}} game against this player</p>
                                            <span class="absolute left-1/2 -translate-x-1/2 top-3 -z-10 block h-5 w-5 bg-zinc-800 rounded-sm rotate-45"></span>
                                        </div>
                                    </div>
                                    <div class="flex-1 inline-flex items-center gap-1 rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/10 relative group">
                                        {{$data['against']['losses']}}
                                        <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                        <div class="opacity-0 absolute -top-8 left-1/2 -translate-x-1/2 pointer-events-auto group-hover:opacity-100 transition-opacity duration-150 inline-flex items-center rounded-md bg-zinc-800 px-2 py-1 text-xs font-medium text-white ring-1 ring-inset ring-zinc-800/10">
                                            <p class="text-xs">You have lost {{$data['against']['losses']}} game against this player</p>
                                            <span class="absolute left-1/2 -translate-x-1/2 top-3 -z-10 block h-5 w-5 bg-zinc-800 rounded-sm rotate-45"></span>
                                        </div>
                                    </div>
                                    <div class="flex-1 inline-flex items-center gap-1 rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">
                                        {{$data['against']['winrate']}} %
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </td>
                        @else
                        <td colspan="3" class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 group relative">
                            <span class="w-full flex items-center justify-center rounded-md bg-yellow-50 px-2 py-1 text-xs font-medium text-yellow-800 ring-1 ring-inset ring-yellow-600/20">
                                No data
                            </span>
                            <div class="opacity-0 absolute -top-6 left-1/2 -translate-x-1/2 pointer-events-auto group-hover:opacity-100 flex transition-opacity duration-150 items-center justify-between gap-x-6 bg-gray-900 px-2 py-1 sm:rounded">
                                <p class="text-xs leading-6 text-white">
                                    <strong class="font-semibold">No Data ?</strong>
                                    <span>It's because you leave the game until the end of the match.</span>
                                </p>
                                <span class="absolute left-1/2 -translate-x-1/2 top-5 -z-10 block h-5 w-5 bg-black rounded-sm rotate-45"></span>
                            </div>
                        </td>
                        @endif
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ date('H:i:s d.m.Y', strtotime($player['timeMet'])) }}</td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ (isset($player['updatedAt'])) ? date('H:i:s d.m.Y', strtotime($player['updatedAt'])) : 'N/A' }}</td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="7" class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                            <span class="w-full flex items-center justify-center rounded-md bg-yellow-50 px-2 py-1 text-xs font-medium text-yellow-800 ring-1 ring-inset ring-yellow-600/20">
                                No data or change filter
                            </span>
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </section>
</x-app-layout>