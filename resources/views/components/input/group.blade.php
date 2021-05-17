@props([
    'label',
    'for',
    'error' => false,
    'helpText' => false,
])

<div class="grid grid-cols-3 gap-6">
    <div class="col-span-3 sm:col-span-2">
        <label for="{{ $for }}" class="block text-sm font-medium text-gray-700">
            {{ $label }}
        </label>

        <div>
            {{ $slot }}
        </div>


        @if ($error)
            <div class="text-sm text-red-500 mt-1 mb-1">{{ $error }}</div>
        @endif

        @if($helpText)
            <p class="mt-2 text-sm text-gray-500">
                {{ $helpText }}
            </p>
        @endif
    </div>
</div>
