@extends('layouts.guest')

@section('content')

<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
        <div class="min-h-screen flex  justify-center py-12 px-4 sm:px-6 lg:px-8 -mt-10">
            <div class="max-w-md w-full space-y-8">
                @if ($message = Session::get('status'))
                <div class="mt-8 space-y-6 bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative" role="alert">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <div>
                    <img class="mx-auto h-12 w-auto" src="{{ asset('images/logo.png') }}" alt="Malighafi Store Logo">
                </div>
                <div class="mb-4 text-sm text-gray-600">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                </div>
                @error('email')
                    <div class=" mt-8 space-y-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <!-- Email Address -->
                            <div class="rounded-md shadow-sm -space-y-px">
                                <div>
                                  <label for="email-address" class="sr-only">{{__('Email address')}}</label>
                                  <input id="email-address" name="email" type="email" autocomplete="email" required class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Email address" :value="old('email', $request->email)" required autofocus>
                              </div>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    {{ __('Email Password Reset Link') }}
                                </button>
                            </div>
                        </form>
                </div>
            </div>
    </div>
</div>
@endsection

