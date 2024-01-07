<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Login') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles

        <style>
        
        .min-h-screen {
            background-image: url('../admin/assets/images/LoginBG10.jpg');
            background-size: cover;
            background-position: center;
        }

        </style>
    </head>
    <body >
        <div class="font-sans text-white-900 antialiased">
            {{ $slot }}
        </div>

        @livewireScripts
    </body>
</html>
