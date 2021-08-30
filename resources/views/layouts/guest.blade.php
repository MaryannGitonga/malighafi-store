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
        <link rel="stylesheet" href="{{ asset('npm/boxicons_2.0.5/css/boxicons.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('assets/styles/fonts.css') }}" media="screen"/>
        <link rel="stylesheet" href="{{ asset('assets/styles/main.min.css') }}" media="screen"/>

        <style>
            @import url('https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@600&display=swap');
        </style>

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
        <script src="{{ asset('js/app.js') }}" defer></script>

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
            <div class="container relative">
                <div class="py-6 lg:py-10 z-50 relative" style="margin-left: 0; margin-right: 0; padding-left: 0; padding-right:0 width:100% margin:auto;">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center">
                            <div class="block lg:hidden">
                                <i class="bx bx-menu text-indigo-500 text-4xl"
                                   @click="mobileMenu = !mobileMenu"></i>
                            </div>
                        </div>
                        <a href="{{ route('shop') }}">
                            <div class="h-auto flex items-center logo lg:mr-48 pr-64">
                                <h1 style="font-family: 'Source Sans Pro', sans-serif; color: #5a67da;" class="lg:text-5xl md:text-4xl sm:text-2xl">Malighafi Store</h1>
                            </div>
                        </a>
                        <div class="hidden">
                            <i class="bx bx-menu text-indigo-500 text-3xl"
                               @click="mobileMenu = true"></i>
                        </div>
                    </div>
                    <div class="justify-center lg:pt-8 hidden lg:flex">
                        <ul class="list-reset flex items-center">
                            <li class="mr-10">
                                <a href="{{ route('shop') }}"
                                   class="block text-lg font-hk hover:font-bold transition-all text-secondary hover:text-indigo-500 border-b-2 border-white hover:border-indigo-500 px-2">Shop</a>
                            </li>
                            <li class="mr-10">
                                <a href="{{ route('about') }}"
                                   class="block text-lg font-hk hover:font-bold transition-all text-secondary hover:text-indigo-500 border-b-2 border-white hover:border-indigo-500 px-2">About</a>
                            </li>
                            <li class="mr-10">
                                <a href="{{ route('contact') }}"
                                   class="block text-lg font-hk hover:font-bold transition-all text-secondary hover:text-indigo-500 border-b-2 border-white hover:border-indigo-500 px-2">Contact</a>
                            </li>
                        </ul>
                        <ul class="list-reset flex items-center justify-end">
                            <li class="mr-10">
                                <a href="{{ route('login') }}"
                                   class="block text-lg font-hk hover:font-bold transition-all text-secondary hover:text-indigo-500 border-b-2 border-white hover:border-indigo-500 px-2">Login</a>
                            </li>
                            <li class="mr-10">
                                <a href="{{ route('register') }}"
                                   class="block text-lg font-hk hover:font-bold transition-all text-secondary hover:text-indigo-500 border-b-2 border-white hover:border-indigo-500 px-2">Sign Up</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="fixed inset-x-0 pt-20 md:top-28 z-50 opacity-0 pointer-events-none transition-all "
                 :class="{ 'opacity-100 pointer-events-auto': mobileMenu }">
                <div class="w-full absolute left-0 top-0 px-6 z-40 bg-white shadow-sm">
                        <a href="{{ route('shop') }}"
                        class="w-full py-3 cursor-pointer font-hk font-medium text-secondary border-b border-grey-dark block">Shop
                        </a>
                        <a href="{{ route('about') }}"
                            class="w-full py-3 cursor-pointer font-hk font-medium text-secondary border-b border-grey-dark block">About
                        </a>
                        <a href="{{ route('contact') }}"
                            class="w-full py-3 cursor-pointer font-hk font-medium text-secondary border-b border-grey-dark block">Contact
                        </a>
                    <a href="{{ route('login') }}"
                    class="w-full py-3 cursor-pointer font-hk font-medium text-secondary border-b border-grey-dark block">Login
                    </a>
                    <a href="{{ route('register') }}"
                        class="w-full py-3 cursor-pointer font-hk font-medium text-secondary border-b border-grey-dark block">Sign Up
                    </a>
                </div>
            </div>
            <main>
                @yield('content')
            </main>
        </div>
        @laravelViewsScripts
    </body>
</html>
