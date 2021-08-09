@extends('layouts.app')

@section('content')

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

<div class="mx-auto py-6 sm:px-6 lg:px-32">
    <div class="px-4 py-6 sm:px-0">
<div class="bg-grey-light lg:w-full mt-12 lg:mt-0">
    <div class="py-8 px-5 md:px-8">
        @if (Auth::user()->roles()->where('role_id', App\Enums\UserType::Seller)->first() != null)
            @if (Auth::user()->roles()->where('role_id', App\Enums\UserType::Seller)->first()->pivot->status == App\Enums\AccountStatus::Active)
                @livewire('seller-orders-table-view')
            @endif
        @endif

        @if (Auth::user()->roles()->where('role_id', App\Enums\UserType::Administrator)->first() != null)
            @if (Auth::user()->roles()->where('role_id', App\Enums\UserType::Administrator)->first()->pivot->status == App\Enums\AccountStatus::Active)
                @livewire('admin-orders-table-view')
            @endif
        @endif
    </div>
</div>
    </div>
</div>
@endsection
