<div>
    <div
        class="mt-1"
        x-data="{
         value: @entangle($attributes->wire('model')),
         isFocused() { return document.activeElement === this.$refs.trix },
         setValue() { this.$refs.trix.editor.loadHTML(this.value) },
        }"
        x-init="setValue(); $watch('value', value => () => !isFocused() && setValue())"
        x-on:trix-change="value = $event.target.value"
        {{ $attributes->whereDoesntStartWith('wire:model') }}
        wire:ignore
    >
        <input id="x" type="hidden">
        <trix-editor x-ref="trix" input="x" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" ></trix-editor>
    </div>
</div>

@push('styles')
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@1.3.1/dist/trix.css">
@endpush

@push('scripts')
    <script src="https://unpkg.com/trix@1.3.1/dist/trix.js"></script>
@endpush
