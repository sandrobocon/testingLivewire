<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @livewireStyles
</head>

<body>
{{-- Change from V1 to V2 (livewire)   @yield('content') ==> TO ==>  {{$slot}} --}}
    {{$slot}}


    @livewireScripts
</body>

</html>
