<div>
    <div class="md:grid md:grid-cols-3 md:gap-6">

        <div class="mt-5 md:mt-0 md:col-span-2">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                Profile
            </div>

            <form wire:submit.prevent="save" class="mt-8 space-y-6" action="#" method="POST">
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                        <div class="grid grid-cols-3 gap-6">
                            <div class="col-span-3 sm:col-span-2">
                                <label for="username" class="block text-sm font-medium text-gray-700">
                                    Username
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                  <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                    http://testingLaravel.com/
                  </span>
                                    <input wire:model="username" type="text" name="username" id="username" class="@error('username') border-red-500 @enderror focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                                </div>
                                @error('username') <div class="text-sm text-red-500 mt-1 mb-1">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div>
                            <label for="about" class="block text-sm font-medium text-gray-700">
                                About
                            </label>
                            <div class="mt-1">
                                <textarea wire:model="about" id="about" name="about" rows="3" class="@error('about') border-red-500 @enderror shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>

                            </div>
                            @error('about') <div class="text-sm text-red-500 mt-1 mb-1">{{ $message }}</div> @enderror
                            <p class="mt-2 text-sm text-gray-500">
                                Write about yourself.
                            </p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">
                                Photo
                            </label>
                            <div class="mt-1 flex items-center">
                <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                  <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                  </svg>
                </span>
                                <button type="button" class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Change
                                </button>
                            </div>
                        </div>


                    </div>

                    <div class="space-x-5 px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <span>
                            <span
                                x-data="{ open: false }"
                                x-init="
                                    {{--window.livewire.on('notify-saved', () => {  // listen globally--}}
                                    @this.on('notify-saved', () => { {{-- listen only to selfWireComponent --}}
                                        setTimeout(() => { open = false }, 2500);
                                        open = true;
                                    })
                                "
                                x-show.transition.duration.1000ms="open"
                                style="display: none;"
                                class="text-gray-500"
                            >Saved!</span>
                        </span>

                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="hidden sm:block" aria-hidden="true">
    <div class="py-5">
        <div class="border-t border-gray-200"></div>
    </div>
</div>


