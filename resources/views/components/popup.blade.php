@props(["setOpen" => false])

<div x-data="{
        open: {{ $setOpen ? 'true' : 'false' }},
        focusables() {
            // All focusable element types...
            let selector = 'a, button, input:not([type=\'hidden\']), textarea, select, details, [tabindex]:not([tabindex=\'-1\'])'

            return [...$el.querySelectorAll(selector)]
                // All non-disabled elements...
                .filter(el => ! el.hasAttribute('disabled'))
        },
        firstFocusable() { return this.focusables()[0] },
        lastFocusable() { return this.focusables().slice(-1)[0] },
        nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() },
        prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() },
        nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) },
        prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) -1 },
    }" x-init="$watch('open', value => {
        if (value) {
            document.body.classList.add('overflow-y-hidden');
            {{ $attributes->has('focusable') ? 'setTimeout(() => firstFocusable().focus(), 100)' : '' }}
        } else {
            document.body.classList.remove('overflow-y-hidden');
        }
    })" x-on:close.stop="open = false" x-on:keydown.escape.window="open = false" x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()" x-on:keydown.shift.tab.prevent="prevFocusable().focus()">
    <div @click="open = ! open">
        {{ $trigger }}
    </div>

    <div class="fixed inset-0 flex justify-center items-center z-10" x-show="open">
        <div x-show="open" @click="open = false" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="transform opacity-0" x-transition:enter-end="transform opacity-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="transform opacity-100" x-transition:leave-end="transform opacity-0" style="display: none;" class="fixed inset-0 bg-black bg-opacity-25 transition-opacity"></div>

        <div x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" style="display: none;" class="overflow-y-auto">
            <form method="Post" action="{{Route('upload')}}" enctype="multipart/form-data" class="relative transform overflow-hidden rounded-lg bg-white p-6 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                @csrf
                <div class="text-center">
                    <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Upload your data</h3>
                    <div class="mt-4 flex flex-col gap-2">
                        <p class="text-zinc-400 text-sm">To get started, upload your data from BakkesMod.</p>
                        <p class="text-zinc-400 text-sm">Go on file menu on BakkesMod and click on <span class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">Open BakkesMod Folder</span>.</p>
                        <p class="text-zinc-400 text-sm">You can find your data in the <span class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">\data\dejavu</span> folder in your BakkesMod installation directory.</p>
                        <p class="text-zinc-400 text-sm">The file you need to upload is called <span class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">player_counter.json</span>.</p>
                    </div>
                    <div class="mt-4 border-t border-gray-200 px-2 py-2 sm:px-3">
                        <label class="relative flex-1">
                            <span class="sr-only">File</span>
                            <input name="file" type="file" class="block w-full text-sm text-slate-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-full file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-violet-50 file:text-blue-500
                                    hover:file:bg-blue-100 hover:file:cursor-pointer" value="{{ old('file') }}" placeholder="Upload your data" required accept="json" />
                        </label>
                        @error('file')
                        <div class="mt-4 flex items-center">
                            <span class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/10">{{ $message }}</span>
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="mt-5 sm:mt-6 sm:grid sm:grid-flow-row-dense sm:grid-cols-2 sm:gap-3">
                    <button type="submit" class="inline-flex w-full justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 sm:col-start-2">
                        Sumbit my data
                    </button>
                    <button type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:col-start-1 sm:mt-0" @click="open = false">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>