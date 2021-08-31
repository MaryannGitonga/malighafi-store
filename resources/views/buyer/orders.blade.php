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
           class="transition-all hover:font-bold hover:text-indigo-500 px-4 py-3 border-l-2 border-indigo-500-lighter hover:border-indigo-500  font-hk text-grey-darkest">My Account</a>
        <a href="{{ route('buyer.inbox') }}"
           class="transition-all hover:font-bold hover:text-indigo-500 px-4 py-3 border-l-2 border-indigo-500-lighter hover:border-indigo-500  font-hk text-grey-darkest">My Inbox
           @if (count($messages) != null)
           <span class="font-bold text-xs bg-indigo-500 text-white rounded-full px-1 items-center justify-center">{{ count($messages) }}</span>
           @endif
        </a>
        <a href="{{ route('buyer.orders') }}"
           class="transition-all hover:font-bold hover:text-indigo-500 px-4 py-3 border-l-2 border-indigo-500-lighter hover:border-indigo-500  font-hk font-bold text-indigo-500 border-indigo-500 ">Orders</a>
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
    <div class="bg-grey-light py-8 px-5 md:px-8">
        <h1 class="font-hkbold text-secondary text-2xl pb-6 text-center sm:text-left">Order List</h1>
        <div class="hidden sm:block">
            <div class="flex justify-between pb-3">
                <div class="w-1/3 md:w-2/5 pl-4">
                    <span class="font-hkbold text-secondary text-sm uppercase">Product Name</span>
                </div>
                <div class="w-1/4 xl:w-1/5 text-center">
                    <span class="font-hkbold text-secondary text-sm uppercase">Quantity</span>
                </div>
                <div class="w-1/6 md:w-1/5 text-center mr-3">
                    <span class="font-hkbold text-secondary text-sm uppercase">Price</span>
                </div>
                <div class="w-3/10 md:w-1/5 text-center">
                    <span class="font-hkbold text-secondary text-sm uppercase pr-8 md:pr-16 xl:pr-8">Status</span>
                </div>
            </div>
        </div>
        @foreach ($buyer_orders as $order)
        <div class="bg-white shadow px-4 py-5 sm:py-4 rounded mb-3 flex flex-col sm:flex-row justify-between items-center">
            <div class="w-full sm:w-1/3 md:w-2/5 flex flex-col md:flex-row md:items-center border-b sm:border-b-0 border-grey-dark pb-4 sm:pb-0 text-center sm:text-left">
                <span class="font-hkbold text-secondary text-sm uppercase text-center pb-2 block sm:hidden">Product Name</span>
                <span class="font-hk text-secondary text-base mt-2">{{ App\Models\Product::find($order->product_id)->name}}</span>
            </div>
            <div class="w-full sm:w-1/5 text-center border-b sm:border-b-0 border-grey-dark pb-4 sm:pb-0">
                <span class="font-hkbold text-secondary text-sm uppercase text-center pt-3 pb-2 block sm:hidden">Quantity</span>
                <span class="font-hk text-secondary">{{ $order->quantity }}</span>
            </div>
            <div class="w-full sm:w-1/6 xl:w-1/5 text-center sm:text-right sm:pr-6 xl:pr-16 border-b sm:border-b-0 border-grey-dark pb-4 sm:pb-0">
                <span class="font-hkbold text-secondary text-sm uppercase text-center pt-3 pb-2 block sm:hidden">Price</span>
                <span class="font-hk text-secondary">Ksh {{ number_format($order->quantity * $order->price) }}</span>
            </div>
            <div class="w-full sm:w-3/10 md:w-1/4 xl:w-1/5 text-center sm:text-right ">
                <div class="pt-3 sm:pt-0">
                    <p class="font-hkbold text-secondary text-sm uppercase text-center pb-2 block sm:hidden">Status</p>
                    <span
                          class={{ ($order->status == App\Enums\OrderStatus::delivered) ? "bg-v-green-light border border-v-green" : "bg-orange-200 border border-orange-700" }} class="px-4 py-3 inline-block rounded font-hk text-primary">{{ $order->status }}</span>
                </div>
            </div>
        </div>
        @endforeach
        <div class="pt-6 flex justify-center md:justify-end">
            <span class="font-hk font-semibold text-grey-darkest transition-colors hover:text-black pr-5 cursor-pointer">Previous</span>
<span
class="font-hk font-semibold text-black transition-colors hover:text-white text-sm hover:bg-primary h-6 w-6 rounded-full flex items-center justify-center mr-3 cursor-pointer">1</span>
<span class="font-hk font-semibold text-grey-darkest transition-colors hover:text-black pl-2 cursor-pointer">Next</span>
        </div>
    </div>
</div>
    </div>
</div>
    </div>
  </div>
@endsection
