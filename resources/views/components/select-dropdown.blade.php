<div x-data="{ isOpen: false }">
    <label id="listbox-label" class="block text-sm font-medium leading-6 text-gray-900">Assigned to</label>
    <div class="relative mt-2">
        <button type="button" x-on:click="isOpen = !isOpen" class="relative w-full cursor-pointer rounded-md bg-white py-1.5 pl-3 pr-10 text-left text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6" aria-haspopup="listbox" :aria-expanded="isOpen ? 'true' : 'false" aria-labelledby="listbox-label">
            <span class="block truncate">Tom Cook</span>
            <span class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
                <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10 3a.75.75 0 01.55.24l3.25 3.5a.75.75 0 11-1.1 1.02L10 4.852 7.3 7.76a.75.75 0 01-1.1-1.02l3.25-3.5A.75.75 0 01-10 3zm-3.76 9.2a.75.75 0 011.06.04l2.7 2.908 2.7-2.908a.75.75 0 111.1 1.02l-3.25 3.5a.75.75 0 01-1.1 0l-3.25-3.5a.75.75 0 01.04-1.06z" clip-rule="evenodd" />
                </svg>
            </span>
        </button>

        <ul x-show="isOpen" class="absolute z-10 mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm" tabindex="-1" role="listbox" :aria-labelledby="isOpen ? 'listbox-label' : null">
            <!-- Select options... -->
        </ul>
    </div>
</div>