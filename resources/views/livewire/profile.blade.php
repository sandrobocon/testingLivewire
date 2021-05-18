<div>
    <div>
        <div class="mt-5 md:mt-0 md:col-span-2">
            <form wire:submit.prevent="save" class="mt-8 space-y-6" action="#" method="POST">
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                        <x-input.group label="Username" for="username" :error="$errors->first('username')">
                            <x-input.text wire:model="username" id="username" leading-add-on="testingLaravel.com/"/>
                        </x-input.group>

                        <x-input.group label="Birthday" for="birthday" :error="$errors->first('birthday')">
                            <x-input.date wire:model="birthday" id="birthday" placeholder="MM/DD/YYYY" />
                        </x-input.group>

                        <x-input.group label="About" for="about" :error="$errors->first('about')" help-text="Write about yourself.">
                            <x-input.rich-text wire:model.lazy="about" id="about" :initial-value="$about" />
                        </x-input.group>

                        <x-input.group label="Photo" for="photo" :error="$errors->first('newAvatar')" help-text="Send your Photo">
                            <div class="mt-1 flex items-center">
                                <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                                    @if ($newAvatar)
                                        <img src="{{ $newAvatar->temporaryUrl() }}" alt="Profile Photo">
                                    @else
                                        <img src="{{ auth()->user()->avatarUrl }}" alt="Profile Photo">
                                    @endif
                                </span>

                                <span>
                                    <input type="file" wire:model="newAvatar">
{{--                                <button type="button" class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">--}}
                                    {{--                                    Change--}}
                                    {{--                                </button>--}}
                                </span>
                            </div>
                        </x-input.group>
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


