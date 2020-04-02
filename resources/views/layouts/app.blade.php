<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <v-app dark>
            <v-app-bar  dense>
                <img
                class="mr-2"
                src="{{ asset('images/stiker.png') }}"
                alt="John"
                height="30"
                >
                <v-toolbar-title>Lomba - Sosialisai Corona</v-toolbar-title>
                <v-spacer></v-spacer>
            </v-app-bar>
            <v-content>
                @yield('content')
            </v-content>
        </v-app>
    </div>
</body>
</html>
