@props(['sortBy', 'order', 'value'])
<!-- 
    Step 1: if not selected
    Step 3: if order = desc
    Step 2: if order = asc 
 -->

<div x-data="{ step: {{ ($sortBy == $value && $order == 'asc') ? 2 : (($sortBy == $value && $order == 'desc') ? 3 : 1) }} }" class="relative">
    <button type="submit" name="action" value="{{ $value }},{{($sortBy == $value && $order == 'desc') ? 'asc' : 'desc'}}" class="flex items-center gap-2 text-left text-sm font-semibold text-gray-900 align-baseline">
        {{ $slot }}
        <div class=" flex flex-col bg-white border border-zinc-200 rounded-md p-0.5">
            <template x-if="step === 1">
                <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                    <path fill-rule="evenodd" d="M10 3a.75.75 0 01.55.24l3.25 3.5a.75.75 0 11-1.1 1.02L10 4.852 7.3 7.76a.75.75 0 01-1.1-1.02l3.25-3.5A.75.75 0 0110 3zm-3.76 9.2a.75.75 0 011.06.04l2.7 2.908 2.7-2.908a.75.75 0 111.1 1.02l-3.25 3.5a.75.75 0 01-1.1 0l-3.25-3.5a.75.75 0 01.04-1.06z" clip-rule="evenodd" />
                </svg>
            </template>
            <template x-if="step === 2">
                <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                    <path fill-rule="evenodd" d="M14.77 12.79a.75.75 0 01-1.06-.02L10 8.832 6.29 12.77a.75.75 0 11-1.08-1.04l4.25-4.5a.75.75 0 011.08 0l4.25 4.5a.75.75 0 01-.02 1.06z" clip-rule="evenodd" />
                </svg>
            </template>
            <template x-if="step === 3">
                <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                </svg>
            </template>
        </div>
    </button>
</div>