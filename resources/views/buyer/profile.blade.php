@extends('layouts.app')

@section('content')
<div class="container">
    <div class="pt-10 sm:pt-12 pb-16 sm:pb-20 lg:pb-24 flex flex-col lg:flex-row justify-between">
        <div class="lg:w-1/4">
    <p class=" text-secondary text-2xl sm:text-3xl lg:text-4xl pb-6">My Account</p>
    <div class="pl-3 flex flex-col">
        <a href="{{ route('buyer.profile') }}"
           class="transition-all hover:font-bold hover:text-indigo-500 px-4 py-3 border-l-2 border-indigo-500-lighter hover:border-indigo-500  font-hk font-bold text-indigo-500 border-indigo-500 ">My Account</a>
        <a href="account/orders.html"
           class="transition-all hover:font-bold hover:text-indigo-500 px-4 py-3 border-l-2 border-indigo-500-lighter hover:border-indigo-500  font-hk text-grey-darkest ">Orders</a>
        <a href="account/wishlist.html"
           class="transition-all hover:font-bold hover:text-indigo-500 px-4 py-3 border-l-2 border-indigo-500-lighter hover:border-indigo-500  font-hk text-grey-darkest ">Wishlist</a>
        <a href="index.html"
           class="transition-all hover:font-bold hover:text-indigo-500 px-4 py-3 border-l-2 border-indigo-500-lighter hover:border-indigo-500  font-hk text-grey-darkest">Activate Vendor Account</a>
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
            <div class="mt-8 space-y-6 bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative mb-4" role="alert">
                <p>{{ $message }}</p>
            </div>
            @endif
            <div class="bg-grey-light py-10 px-6 sm:px-10 mb-6 rounded-lg">
                <h1 class="font-hkbold text-secondary text-2xl sm:text-left mb-12">Account Details</h1>
                <div class="mb-12">
                    <img src="{{ asset('images/avatar.png') }}"
                         alt="user profile image"
                         class="object-cover h-40 w-40 rounded-full overflow-hidden"/>
                </div>
                <form method="POST" action="{{ route('buyer.update-profile') }}">
                @csrf
                @method('PUT')
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
                                   value="{{ $user->name }}"
                                   id="name"/>
                        </div>
                        <div class="">
                            <label for="email"
                                   class="font-hk text-secondary block mb-2">Email Address</label>
                            <input type="email"
                                   class="appearance-none rounded relative block w-full px-3 py-2 border-none placeholder-gray-500 text-gray-500 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 bg-grey-light"
                                   value="{{ $user->email }}"
                                   id="email" disabled/>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-5 md:mt-8">
                        <div>
                            <a href="{{ route('password.request') }}" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">{{ __('Reset Password') }}</a>
                        </div>

                        <div>
                            <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">{{ __('Update My Profile') }}</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="bg-grey-light py-10 px-6 sm:px-10 mb-6 rounded-lg">
                <div class="my-8">
                            <h4 class="font-hkbold text-secondary text-xl sm:text-left mb-2">Address Details</h4>
                            <form action="{{ route('buyer.update-address') }}" method="POST">
                            @csrf
                            @method('PUT')
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                @error('postal_address')
                                    <div class=" mt-8 space-y-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                                <div class="w-full">
                                    <label for="postal_address"
                                           class="font-hk text-secondary block mb-2">Postal Address</label>
                                    <input type="text"
                                           class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10"
                                           id="postal_address" name="postal_address" placeholder="Postal Address" value="{{ $user->postal_address }}"/>
                                </div>
                                @error('zip_code')
                                    <div class=" mt-8 space-y-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                                <div class="w-full">
                                    <label for="zip_code"
                                           class="font-hk text-secondary block mb-2">Zip Code</label>
                                    <input type="text"
                                           class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10"
                                           id="zip_code" name="zip_code" placeholder="Zip Code" value="{{ $user->zip_code }}"/>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                @error('physical_address')
                                    <div class=" mt-8 space-y-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                                <div class="w-full">
                                    <label for="physical_address"
                                           class="font-hk text-secondary block mb-2">Physical Address</label>
                                    <input type="text"
                                           class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10"
                                           id="physical_address" name="physical_address" placeholder="Estate, Street Name, Area" value="{{ $user->physical_address }}"/>
                                </div>
                                @error('county')
                                    <div class=" mt-8 space-y-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                                <div class="w-full">
                                    <label for="county"
                                       class="font-hk text-secondary block mb-2">County</label>
                                <select class="form-select appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10"
                                        id="county" name="county" placeholder="County">
                                    <option value="{{ $user->county }}" selected>{{ $user->county }}</option>
                                    <option value="Mombasa">Mombasa</option>
                                    <option value="Nairobi">Nairobi</option>
                                </select>
                                </div>
                            </div>
                            <div class="w-full sm:w-1/2 md:pr-5 mt-5">
                                <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">{{ __('Update Address Details') }}</button>
                            </div>
                        </form>
                </div>
            </div>

            <div class="bg-grey-light py-10 px-6 sm:px-10 mb-6 rounded-lg">
                <div class="mt-8">
                    <h4 class="font-hkbold text-secondary text-xl sm:text-left mb-2">Payment Details</h4>
                    <form action="{{ route('buyer.update-mpesa') }}" method="POST">
                    @csrf
                    @method('PUT')
                        @error('mpesa_no')
                            <div class=" mt-8 space-y-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                        <div class="mt-5">
                            <label for="mpesa_no"
                                   class="font-hk text-secondary block mb-2">Mpesa Number</label>
                            <input type="text"
                            class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10"
                            id="mpesa_no" name="mpesa_no" placeholder="0712345678" value="{{ $user->mpesa_no }}"/>
                        </div>
                    </div>
                        <div class="w-full sm:w-1/2 md:pr-5 mt-5">
                            <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">{{ __('Update Mpesa Number') }}</button>
                        </div>
                    </form>
            </div>
                    </div>
                </form>
        </div>
    </div>
</div>
@endsection
