@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
<div class="min-h-screen flex  justify-center py-12 px-4 sm:px-6 lg:px-8 -mt-10">
    @if ($message = Session::get('info'))
        <div class="mt-8 space-y-6 bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative" role="alert">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="max-w-md w-full space-y-8">
        <div>
            <img class="mx-auto h-12 w-auto" src="{{ asset('images/logo.png') }}" alt="Malighafi Store Logo">
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
            Vendor Credentials
            </h2>
        </div>
        <form method="POST" action="{{ route('account.upload-permit') }}" enctype="multipart/form-data">
            @csrf

            @error('kra_pin')
                    <div class=" mt-8 space-y-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
                <div class="rounded-md shadow-sm -space-y-px mb-4">
                    <label for="kra_pin"
                            class="font-hk text-secondary block mb-2">KRA Pin</label>
                    <input type="text"
                            class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" id="kra_pin" name="kra_pin" placeholder="KRA Pin" value=""/>
                </div>
                @error('permit_no')
                    <div class=" mt-8 space-y-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
                <div class="rounded-md shadow-sm -space-y-px mb-4">
                    <label for="permit_no"
                            class="font-hk text-secondary block mb-2">Permit Number</label>
                    <input type="text"
                            class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" id="permit_no" name="permit_no" placeholder="Permit Number" value=""/>
                </div>
                @error('permit_upload')
                    <div class=" mt-8 space-y-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
                <div class="rounded-md shadow-sm -space-y-px mb-4">
                    <label for="permit_upload"
                            class="font-hk text-secondary block mb-2">Permit Upload</label>
                    <input type="file" id="permit_upload"
                    class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" name="permit_upload" placeholder="0712345678" value=""/>
                </div

            <div class="flex items-center justify-end mt-4">
                <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <!-- Heroicon name: solid/lock-closed -->
                        <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                        </svg>
                    </span>
                    {{ __('Submit Credentials') }}
                </button>
                <a href="{{ route('buyer.profile') }}" class="underline text-sm text-indigo-400 hover:text-indigo-600">
                    {{ __('Back') }}
                </a>
            </div>
        </form>
    </div>
</div>
    </div>
</div>
@endsection
