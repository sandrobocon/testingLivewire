@props(['initialValue' => ''])

<div>
    <div
        class="mt-1"
        wire:ignore
        x-data
        @trix-blur="$dispatch('change', $event.target.value)"
        {{ $attributes }}
    >
        <input id="x" value="{{ $initialValue }}" type="hidden">
        <trix-editor input="x" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" ></trix-editor>
    </div>
</div>

@push('styles')
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@1.3.1/dist/trix.css">
@endpush

@push('scripts')
    <script src="https://unpkg.com/trix@1.3.1/dist/trix.js"></script>
@endpush
