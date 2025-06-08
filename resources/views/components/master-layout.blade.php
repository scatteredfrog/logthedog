<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Log the Dog</title>
        <link rel="stylesheet" href="{{ asset('css/ltd.css') }}">
        <link rel="stylesheet" href="{{ asset('css/glyphicons.css') }}">
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body>
        <x-navbar></x-navbar>
        <div class="row-fluid mt-5">
            @yield('content')
        </div>
        {{-- <?php dd(Auth::user()); ?> --}}
    </body>
</html>