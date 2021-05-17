@props([
    'leadingAddOn' => false,
])

<div class="mt-1 flex rounded-md shadow-sm">
    @if($leadingAddOn)
        <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
            {{$leadingAddOn}}
        </span>
    @endif

    <input {{ $attributes }} type="text"
        class="{{$leadingAddOn ? 'rounded-none rounded-r-md' : 'rounded-md'}}  focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full  sm:text-sm border-gray-300">
</div>
