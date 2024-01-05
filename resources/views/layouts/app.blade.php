<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles


        <style>
        
       

        .bgcolor {
            background-color: #4d194d;
            background-size: cover;
        }

        </style>

    </head>
    <body class="font-sans antialiased" >
       

        <div class="">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        $(document).ready(function () {
            // Check if the user is authenticated
            @auth
                // Add a listener for the back button
                window.addEventListener('popstate', function (event) {
                    // Display a confirmation message when the user tries to navigate back
                    var confirmLogout = confirm("Do you really want to log out?");
                    if (confirmLogout) {
                        // Perform logout action or redirect to the logout route
                        window.location.href = "{{ route('logout') }}";
                    } else {
                        // Prevent the browser from navigating back
                        history.pushState(null, null, window.location.href);
                    }
                });

                // Prevent accessing the login page after authentication
                if (window.location.pathname === "{{ route('login') }}") {
                    window.location.href = "{{url('/redirect')}}";
                }
            @endauth
        });
    </script>

        @stack('modals')

        @livewireScripts
    </body>
</html>
