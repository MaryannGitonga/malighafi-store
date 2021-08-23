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
                            @auth
                                @if (Auth::user()->roles()->where('role_id', App\Enums\UserType::Buyer)->first() != null)
                                    @if (Auth::user()->roles()->where('role_id', App\Enums\UserType::Buyer)->first()->pivot->status == App\Enums\AccountStatus::Active)
                                    <button @click="mobileSearch = !mobileSearch"
                                        class="cursor-pointer border-2 transition-colors border-transparent hover:border-indigo-500 rounded-full p-2 sm:p-4 ml-2 sm:ml-3 md:ml-5 lg:mr-8 group focus:outline-none">
                                        <img src="{{ asset('assets/img/icons/icon-search.svg') }}"
                                            class="w-5 sm:w-6 md:w-8 h-5 sm:h-6 md:h-8 block group-hover:hidden"
                                            alt="icon search"/>
                                        <img src="{{ asset('assets/img/icons/icon-search-hover.svg') }}"
                                        class="w-5 sm:w-6 md:w-8 h-5 sm:h-6 md:h-8 hidden group-hover:block"
                                        alt="icon search hover"/>
                                    </button>
                                    <a href=""
                                        class="border-2 transition-all border-transparent hover:border-indigo-500 rounded-full p-2 sm:p-4 group hidden lg:block">
                                        <img src="{{ asset('assets/img/icons/icon-heart.svg') }}"
                                            class="w-5 sm:w-6 md:w-8 h-5 sm:h-6 md:h-8 block group-hover:hidden"
                                            alt="icon heart"/>
                                        <img src="{{ asset('assets/img/icons/icon-heart-hover.svg') }}"
                                            class="w-5 sm:w-6 md:w-8 h-5 sm:h-6 md:h-8 hidden group-hover:block"
                                            alt="icon heart hover"/>
                                    </a>
                                    @endif
                                @endif
                            @endauth
                        </div>
                        <a href="{{ route('home') }}">
                            <div class="h-auto flex items-center logo {{ Auth::user() == null ? "lg:mr-48 pr-64" : (Auth::user()->roles()->where('role_id', App\Enums\UserType::Administrator)->first() != null ? "mr-4 pr-2" : "")}}">
                                <h1 style="font-family: 'Source Sans Pro', sans-serif; color: #5a67da;" class="lg:text-5xl md:text-4xl sm:text-2xl">Malighafi Store</h1>
                            </div>
                        </a>
                        @auth
                                <div class="flex items-center">
                                    @if (Auth::user()->roles()->where('role_id', App\Enums\UserType::Buyer)->first() != null)
                                        <a href="{{ (Auth::user()->roles()->where('role_id', App\Enums\UserType::Buyer)->first()->pivot->status == App\Enums\AccountStatus::Active) ? route('buyer.profile') : route('seller.profile') }}"
                                        class="border-2 transition-all border-transparent hover:border-indigo-500 rounded-full p-2 sm:p-4 group">
                                            <img src="{{ asset('assets/img/icons/icon-user.svg') }}"
                                                class="w-5 sm:w-6 md:w-8 h-5 sm:h-6 md:h-8 block group-hover:hidden"
                                                alt="icon user"/>
                                            <img src="{{ asset('assets/img/icons/icon-user-hover.svg') }}"
                                                class="w-5 sm:w-6 md:w-8 h-5 sm:h-6 md:h-8 hidden group-hover:block"
                                                alt="icon user hover"/>
                                        </a>
                                        @if (Auth::user()->roles()->where('role_id', App\Enums\UserType::Buyer)->first()->pivot->status == App\Enums\AccountStatus::Active)
                                        <a href=""
                                        class="hidden lg:block border-2 transition-all border-transparent hover:border-indigo-500 rounded-full p-2 sm:p-4 ml-2 sm:ml-3 md:ml-5 lg:ml-8 group">
                                            <img src="{{ asset('assets/img/icons/icon-cart.svg') }}"
                                                class="w-5 sm:w-6 md:w-8 h-5 sm:h-6 md:h-8 block group-hover:hidden"
                                                alt="icon cart"/>
                                            <img src="{{ asset('assets/img/icons/icon-cart-hover.svg') }}"
                                                class="w-5 sm:w-6 md:w-8 h-5 sm:h-6 md:h-8 hidden group-hover:block"
                                                alt="icon cart hover"/>
                                        </a>
                                        <span @click="mobileCart = !mobileCart"
                                            class="block lg:hidden border-2 transition-all border-transparent hover:border-indigo-500 rounded-full p-2 sm:p-4 ml-2 sm:ml-3 md:ml-5 lg:ml-8 group">
                                            <img src="{{ asset('assets/img/icons/icon-cart.svg') }}"
                                                class="w-5 sm:w-6 md:w-8 h-5 sm:h-6 md:h-8 block group-hover:hidden"
                                                alt="icon cart"/>
                                            <img src="{{ asset('assets/img/icons/icon-cart-hover.svg') }}"
                                                class="w-5 sm:w-6 md:w-8 h-5 sm:h-6 md:h-8 hidden group-hover:block"
                                                alt="icon cart hover"/>
                                        </span>
                                        @endif
                                    @endif

                                    @if (Auth::user()->roles()->where('role_id', App\Enums\UserType::Administrator)->first() != null)
                                        <a href="{{ route('admin.profile') }}"
                                            class="border-2 transition-all border-transparent hover:border-indigo-500 rounded-full p-2 sm:p-4 group">
                                            <img src="{{ asset('assets/img/icons/icon-user.svg') }}"
                                                class="w-5 sm:w-6 md:w-8 h-5 sm:h-6 md:h-8 block group-hover:hidden"
                                                alt="icon user"/>
                                            <img src="{{ asset('assets/img/icons/icon-user-hover.svg') }}"
                                                class="w-5 sm:w-6 md:w-8 h-5 sm:h-6 md:h-8 hidden group-hover:block"
                                            alt="icon user hover"/>
                                        </a>
                                    @endif
                                </div>
                        @endauth
                        <div class="hidden">
                            <i class="bx bx-menu text-indigo-500 text-3xl"
                               @click="mobileMenu = true"></i>
                        </div>
                    </div>
                    <div class="justify-center lg:pt-8 hidden lg:flex">
                        <ul class="list-reset flex items-center">
                            <li class="mr-10">
                                <a href="/"
                                   class="block text-lg font-hk hover:font-bold transition-all text-secondary hover:text-indigo-500 border-b-2 border-white hover:border-indigo-500 px-2">Home</a>
                            </li>
                            <li class="mr-10">
                                <a href="{{ route('about') }}"
                                   class="block text-lg font-hk hover:font-bold transition-all text-secondary hover:text-indigo-500 border-b-2 border-white hover:border-indigo-500 px-2">About</a>
                            </li>
                            <li class="mr-10">
                                <a href="{{ route('shop') }}"
                                   class="block text-lg font-hk hover:font-bold transition-all text-secondary hover:text-indigo-500 border-b-2 border-white hover:border-indigo-500 px-2">Shop</a>
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
                        <a href="{{ route('home') }}"
                            class="w-full py-3 cursor-pointer font-hk font-medium text-secondary border-b border-grey-dark block ">Home
                        </a>
                        <a href="{{ route('about') }}"
                            class="w-full py-3 cursor-pointer font-hk font-medium text-secondary border-b border-grey-dark block">About
                        </a>
                        <a href="{{ route('shop') }}"
                        class="w-full py-3 cursor-pointer font-hk font-medium text-secondary border-b border-grey-dark block">Shop
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
