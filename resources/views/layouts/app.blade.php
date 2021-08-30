<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Malighafi Store') }}</title>

        <link rel="icon" href="{{ asset('images/logo.png') }}">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/styles/styles.css') }}">
        <link rel="stylesheet" href="{{ asset('npm/boxicons_2.0.5/css/boxicons.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('assets/styles/fonts.css') }}" media="screen"/>
        <link rel="stylesheet" href="{{ asset('assets/styles/main.min.css') }}" media="screen"/>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@600&display=swap');
        </style>
        @yield('chart-styles')

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('assets/js/init-alpine.js') }}" defer></script>

        {{-- Chart scripts --}}
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/series-label.js"></script>
        <script src="https://code.highcharts.com/highcharts-3d.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>
        @yield('chart-pie')

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @laravelViewsStyles
    </head>
    <body class="font-sans antialiased" x-data="{
        modal: false,
        mobileMenu: false,
        mobileSearch: false,
        mobileCart: false
    }"
          :class="{ 'overflow-hidden max-h-screen': modal || mobileMenu }"
          @keydown.escape="modal = false">
        <div>
            @include('layouts.navigation')
            <main>
                @yield('content')
            </main>
        </div>
        @laravelViewsScripts
    </body>
</html>
