@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
        <div class="container" x-data="{ 'isDialogOpen': false }"
@keydown.escape="isDialogOpen = false">

<div x-show="isDialogOpen"
:class="{ 'absolute inset-0 z-10 flex items-start justify-center': isDialogOpen }" class="-mt-60">
<div class="relative z-10 inset-0 overflow-y-auto sm:-mt-40 md:-mt-40" x-show="isDialogOpen"
@click.away="isDialogOpen = false">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

      <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

      <!-- This element is to trick the browser into centering the modal contents. -->
      <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

      <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <div class="sm:flex sm:items-start">
            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-indigo-100 sm:mx-0 sm:h-10 sm:w-10">
              <!-- Heroicon name: outline/exclamation -->
              <svg class="h-6 w-6 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
              </svg>
            </div>
            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
              <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                Your Data in The Buyer Account is Safe
              </h3>
              <div class="mt-2">
                <p class="text-md text-gray-500">
                  Not to worry, your data in the buyer account is safe :)
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
          <a href="{{ route('seller.check-permit') }}" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto sm:text-sm">
            Switch
          </a>
          <button type="button" @click="isDialogOpen = false" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
            Cancel
          </button>
        </div>
      </div>
    </div>
  </div>
</div>


    <div class="pt-10 sm:pt-12 pb-16 sm:pb-20 lg:pb-24 flex flex-col lg:flex-row justify-between">
        <div class="lg:w-1/4">
    <p class=" text-secondary text-2xl sm:text-3xl lg:text-4xl pb-6">My Account</p>
    <div class="pl-3 flex flex-col">
        <a href="{{ route('buyer.profile') }}"
           class="transition-all hover:font-bold hover:text-indigo-500 px-4 py-3 border-l-2 border-indigo-500-lighter hover:border-indigo-500  font-hk font-bold text-indigo-500 border-indigo-500 ">My Account</a>
           <a href="{{ route('buyer.inbox') }}"
           class="transition-all hover:font-bold hover:text-indigo-500 px-4 py-3 border-l-2 border-indigo-500-lighter hover:border-indigo-500  font-hk text-grey-darkest">My Inbox
           @if (count($messages) != null)
           <span class="font-bold text-xs bg-indigo-500 text-white rounded-full px-1 items-center justify-center">{{ count($messages) }}</span>
           @endif
        </a>
           <a href="{{ route('buyer.orders') }}"
           class="transition-all hover:font-bold hover:text-indigo-500 px-4 py-3 border-l-2 border-indigo-500-lighter hover:border-indigo-500  font-hk text-grey-darkest ">Orders</a>
        <a @click="isDialogOpen = true" class="transition-all hover:font-bold hover:text-indigo-500 px-4 py-3 border-l-2 border-indigo-500-lighter hover:border-indigo-500  font-hk text-grey-darkest">Switch To Vendor Account</a>
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
                        <img src="{{ $user->profile_photo_path != null ? asset($user->profile_photo_path) : asset('images/avatar.png') }}" onerror="{{ asset('images/avatar.png') }}"
                        alt="user profile image"
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
                            <a href="{{ route('password.reset_request') }}" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">{{ __('Reset Password') }}</a>
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
                            <form action="{{ route('account.update-address') }}" method="POST">
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
                    <form action="{{ route('account.update-mpesa') }}" method="POST">
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
    </div>
  </div>
@endsection
