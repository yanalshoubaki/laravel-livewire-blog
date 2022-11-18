<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        <meta charset="utf-8" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />

        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="author" content="Yanal Shoubaki - yanalshoubaki233@gmail.com" />

        <title>@yield('title') - Blogs</title>

        <link rel="apple-touch-icon" sizes="57x57" href="{{asset('images/favicon/apple-icon-57x57.png')}}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{asset('images/favicon/apple-icon-60x60.png')}}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{asset('images/favicon/apple-icon-72x72.png')}}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{asset('images/favicon/apple-icon-76x76.png')}}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{asset('images/favicon/apple-icon-114x114.png')}}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{asset('images/favicon/apple-icon-120x120.png')}}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{asset('images/favicon/apple-icon-144x144.png')}}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{asset('images/favicon/apple-icon-152x152.png')}}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{asset('images/favicon/apple-icon-180x180.png')}}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{asset('images/favicon/android-icon-192x192.png')}}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{asset('images/favicon/favicon-32x32.png')}}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{asset('images/favicon/favicon-96x96.png')}}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/favicon/favicon-16x16.png')}}">
        <link rel="manifest" href="{{url('/manifest.json')}}">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="{{asset('images/favicon/ms-icon-144x144.png')}}">
        <meta name="theme-color" content="#7868e6">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    @livewireStyles

    <!-- assets -->
        <link type="text/css" rel="stylesheet" href="{{ asset('css/app.css') }}">
        @stack('styles')

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
@livewireScripts
        <!-- Please don't use massive JS files for minor functionality. This is okay for the demo, though. -->
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>


    </head>
    <body>
    @if(!Route::is('login') && !Route::is('register'))
        <x-header></x-header>
    @endif
    <div id="app" class="flex flex-col justify-between items-center min-h-screen">
        <div class="w-full py-16">
            @yield('content')
        </div>

    </div>
    @if(!Route::is('login') && !Route::is('register'))

        <x-footer></x-footer>
    @endif

    @stack('scripts')
    </body>
</html>
