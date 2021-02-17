<html>
<head>
    @livewireStyles
</head>

<body>
{{-- Change from V1 to V2 (livewire)   @yield('content') ==> TO ==>  {{$slot}} --}}
    {{$slot}}


    @livewireScripts
</body>

</html>
