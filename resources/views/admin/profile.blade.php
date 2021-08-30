@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
        <div class="container">
    <div class="pt-10 sm:pt-12 pb-16 sm:pb-20 lg:pb-24 flex flex-col lg:flex-row justify-between">
        <div class="lg:w-1/4">
            <p class=" text-secondary text-2xl sm:text-3xl lg:text-4xl pb-6">My Account</p>
            <div class="pl-3 flex flex-col">
                <a href="{{ route('admin.profile') }}"
                   class="transition-all hover:font-bold hover:text-indigo-500 px-4 py-3 border-l-2 border-indigo-500-lighter hover:border-indigo-500  font-hk font-bold text-indigo-500 border-indigo-500 ">My Account</a>
                   <a href="{{ route('admin.inbox') }}"
                    class="transition-all hover:font-bold hover:text-indigo-500 px-4 py-3 border-l-2 border-indigo-500-lighter hover:border-indigo-500  font-hk text-grey-darkest">My Inbox
                    @if (count($messages) != null)
                    <span class="font-bold text-xs bg-indigo-500 text-white rounded-full px-1 items-center justify-center">{{ count($messages) }}</span>
                    @endif
                    </a>
            </div>
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"
               class="transition-all border hover:bg-indigo-500 hover:text-white border-indigo-500 rounded px-8 py-3 mt-8 inline-block font-hk font-bold text-indigo-500">Log Out</a>
               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
        <div class="lg:w-3/4 mt-12 lg:mt-0">
            @if ($message = Session::get('success'))
                <div x-data='{ open: true }' class="fixed z-50 bottom-0 left-0 w-full p-4 md:w-1/2 md:top-0 md:bottom-auto md:right-0 md:p-8 md:left-auto xl:w-1/3 h-auto rounded">
                    <div class="bg-white rounded p-4 flex items-center shadow-lg h-auto border-gray-200 border" x-show='open'>
                    <div class=" mr-4 rounded-full p-2">
                        <div class=" rounded-full p-1 border-2">
                        <i data-feather="check-circle" class="text-sm w-4 h-4 font-semibold"></i>
                        </div>
                    </div>

                    <div class="flex-1">
                        <b class="text-gray-900 font-semibold">
                            Successful!
                        </b>
                        <div class="text-sm" >
                            <x-lv-alert onClose='open = false'>
                                <div>{{ $message }}</div>
                            </x-lv-alert>
                        </div>
                    </div>

                    {{-- Flush this message from the session --}}
                    <button @click.prevent="{{ $onClose ?? ''}}" class="text-gray-400 hover:text-gray-900 transition duration-300 ease-in-out cursor-pointer">
                        <i data-feather="x-circle"></i>
                    </button>
                    </div>
                </div>
            @endif
            <div class="bg-grey-light py-10 px-6 sm:px-10 mb-6 rounded-lg">
                <h1 class="font-hkbold text-secondary text-2xl sm:text-left mb-12">Account Details</h1>
                <form method="POST" action="{{ route('account.update-profile') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <div class="mb-12">
                        <img src="{{ $admin->profile_photo_path != null ? asset($admin->profile_photo_path) : asset('images/avatar.png') }}" onerror="{{ asset('images/avatar.png') }}"
                        alt="admin profile image"
                        class="object-cover h-40 w-40 rounded-full overflow-hidden"/>

                        <input type="file" class="d-none" id="profile_photo" name="profile_photo" style="display: none;">
                        <label for="profile_photo" class="w-auto md:w-64 mt-4 relative flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Change Profile Image</label>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-5 md:mt-8">
                        @error('name')
                            <div class=" mt-8 space-y-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                        <div class="">
                            <label for="name"
                                   class="font-hk text-secondary block mb-2">Name</label>
                            <input type="text" name="name"
                                   class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10"
                                   value="{{ $admin->name }}"
                                   id="name"/>
                        </div>
                        <div class="">
                            <label for="email"
                                   class="font-hk text-secondary block mb-2">Email Address</label>
                            <input type="email"
                                   class="appearance-none rounded relative block w-full px-3 py-2 border-none placeholder-gray-500 text-gray-500 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 bg-grey-light"
                                   value="{{ $admin->email }}"
                                   id="email" disabled/>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-5 md:mt-8">
                        <div>
                            <a href="{{ route('password.reset_request') }}" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">{{ __('Reset Password') }}</a>
                        </div>

                        <div>
                            <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">{{ __('Update My Profile') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </form>
        </div>
    </div>
</div>
    </div>
  </div>
@endsection
