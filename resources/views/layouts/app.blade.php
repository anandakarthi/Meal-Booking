<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <!--<script src="{{ asset('js/app.js') }}" defer></script>-->

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>

    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a href="{{ route('logout') }}"><img
                            src="https://www.polyhose.com/wp-content/uploads/2018/05/main-logo.png" alt="Girl in a jacket"
                            style="width:100px;height:50px;">

                    </a>                
                    <h1 class="title">
                        Meal Booking

                    </h1>
                    <div id="MyClockDisplay" class="clock" onload="showTime()"></div>
                </div>


                <!--<div id="MyClockDisplay" class="clock" onload="showTime()"></div>-->
            </nav>

            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </body>

</html>
