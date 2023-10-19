@props(['checked' => false])

<div x-data="{ on: {{ $checked ? 'true' : 'false' }} }" class="flex items-center gap-2 pr-4">
    <input type="hidden" name="hideNoData" x-model="on ? 'hide' : 'show'" value="show">
    <button @click="on = !on" type="button" :class="{'bg-indigo-600 duration-200 ease-in-out':on, 'bg-gray-200 duration-200 ease-in-out':!on}" class="bg-gray-200 relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2" role="switch" aria-checked="false">
        <span class="sr-only">Use setting</span>
        <span :class="{'translate-x-5 duration-200 ease-in-out':on, 'translate-x-0 duration-200 ease-in-out':!on}" class="translate-x-0 pointer-events-none relative inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition">
            <span :class="{'opacity-0 duration-100 ease-out':on, 'opacity-100 duration-200 ease-in':!on}" class="opacity-100 duration-200 ease-in absolute inset-0 flex h-full w-full items-center justify-center transition-opacity" aria-hidden="true">
                <svg class="h-3 w-3 text-gray-400" fill="none" viewBox="0 0 12 12">
                    <path d="M4 8l2-2m0 0l2-2M6 6L4 4m2 2l2 2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </span>
            <span :class="{'opacity-100 duration-200 ease-in':on, 'opacity-0 duration-100 ease-out':!on}" class="opacity-0 duration-100 ease-out absolute inset-0 flex h-full w-full items-center justify-center transition-opacity" aria-hidden="true">
                <svg class="h-3 w-3 text-indigo-600" fill="currentColor" viewBox="0 0 12 12">
                    <path d="M3.707 5.293a1 1 0 00-1.414 1.414l1.414-1.414zM5 8l-.707.707a1 1 0 001.414 0L5 8zm4.707-3.293a1 1 0 00-1.414-1.414l1.414 1.414zm-7.414 2l2 2 1.414-1.414-2-2-1.414 1.414zm3.414 2l4-4-1.414-1.414-4 4 1.414 1.414z" />
                </svg>
            </span>
        </span>
    </button>
    <span class="flex items-center gap-2 text-sm first-letter:font-medium text-gray-900" @click="on = !on">
        <span>Hide</span>
        <span class="inline-flex items-center rounded-md bg-yellow-50 px-2 py-1 text-xs font-medium text-yellow-800 ring-1 ring-inset ring-yellow-600/20">No Data</span>
    </span>
</div>