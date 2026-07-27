<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('barbershop_logo.png') }}">
    <title>{{ isset($title) ? 'Barbershop ' . $title : 'Barbershop' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

@if(session('success'))
    <div class="toast toast-top toast-center">
        <div class="alert alert-success animate-fade-out">
            <span>{{ session('success') }}</span>
        </div>
    </div>
@endif

<body class="grow" style="margin: 0; box-sizing: border-box;">
    {{--

    <body class="min-h-screen flex flex-col" style="margin: 0; box-sizing: border-box;"> --}}
        {{ $slot }}
    </body>

    <x-footer />

</html>