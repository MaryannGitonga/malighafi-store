@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
<div class="min-h-screen flex  justify-center py-12 px-4 sm:px-6 lg:px-8 -mt-10">
    <div class="max-w-md w-full space-y-8">
        @if ($message = Session::get('status'))
        <div class="mt-8 space-y-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <p>{{ $message }}</p>
        </div>
        @endif
      <div>
        <img class="mx-auto h-12 w-auto" src="{{ asset('images/logo.png') }}" alt="Malighafi Store Logo">
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
          Sign in to you account
        </h2>
        <p class="mt-2 text-center text-sm text-gray-600">
          Or
          <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
            Create an account
          </a>
        </p>
      </div>

    @error('email')
        <div class="mt-8 space-y-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
    @error('password')
        <div class=" mt-8 space-y-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
      <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST">
        @csrf
        <input type="hidden" name="remember" value="true">
        <div class="rounded-md shadow-sm -space-y-px">
          <div>
            <label for="email-address" class="sr-only">{{__('Email address')}}</label>
            <input id="email-address" name="email" type="email" autocomplete="email" required class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Email address">
        </div>
        </div>
        <div class="rounded-md shadow-sm -space-y-px">
            <div>
                <label for="password" class="sr-only">{{__('Password')}}</label>
                <input id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Password">
            </div>
        </div>

        <div class="flex items-center justify-between">
          <div class="flex items-center">
            <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
            <label for="remember-me" class="ml-2 block text-sm text-gray-900">
                {{__('Remember me')}}
            </label>
          </div>

          @if (Route::has('password.request'))
            <div class="text-sm">
                <a href="{{ route('password.request') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                    {{ __('Forgot your password?') }}
                </a>
            </div>
          @endif
        </div>

        <div>
          <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
              <!-- Heroicon name: solid/lock-closed -->
              <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
              </svg>
            </span>
            {{ __('Log in') }}
          </button>
        </div>
      </form>
    </div>
  </div>
    </div>
</div>
@endsection
