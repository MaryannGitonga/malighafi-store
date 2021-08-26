@extends('layouts.app')

@section('content')

<div class="container border-t border-grey-dark">
    <div class="flex flex-col lg:flex-row justify-between items-center pt-10 sm:pt-12 pb-16 sm:pb-20 lg:pb-24">
        <div class="lg:w-2/3 lg:pr-16 xl:pr-20">
            <div class="flex flex-wrap items-center">
    <a href="{{ route('buyer.cart') }}"
       class="transition-all border-b border-transparent hover:border-primary text-sm text-secondary hover:text-primary font-hk
        ">
        Cart
    </a>
    <i class="bx bx-chevron-right text-sm text-secondary px-2"></i>
    <a href="{{ route('buyer.checkout-info') }}"
       class="transition-all border-b border-transparent hover:border-primary text-sm text-secondary hover:text-primary font-hk
        ">
        Customer information
    </a>
    <i class="bx bx-chevron-right text-sm text-secondary px-2"></i>
    <a href="{{ route('buyer.payment') }}"
       class="transition-all border-b border-transparent hover:border-primary text-sm text-indigo-500 hover:text-primary font-hk
         font-bold ">
        Payment
    </a>
    <i class="bx bx-chevron-right text-sm text-transparent px-2"></i>
</div>
<div class="pt-4 pb-10">
    <div class="mt-10 md:mt-12 border border-grey-darker rounded px-4 sm:px-5 py-3">
        <div class="flex pb-2 border-b border-grey-dark">
            <div class="w-1/5 ">
                <p class="font-hk text-secondary">Contact</p>
            </div>
            <div class="w-3/5">
                <p class="font-hk text-secondary">user@user.com</p>
            </div>
            <div class="w-1/5 text-right">
                <a href="{{ route('buyer.checkout-info') }}"
                   class="font-hk text-primary underline">Change</a>
            </div>
        </div>
        <div class="flex pt-2 pb-2 border-b border-grey-dark">
            <div class="w-1/5 ">
                <p class="font-hk text-secondary">Deliver to</p>
            </div>
            <div class="w-3/5">
                <p class="font-hk text-secondary">Street Address, City, Postal Address Postal Code</p>
            </div>
            <div class="w-1/5 text-right">
                <a href="{{ route('buyer.checkout-info') }}"
                   class="font-hk text-primary underline">Change</a>
            </div>
        </div>
    </div>
    <div class="pt-8 md:pt-10">
        <h1 class="font-hk font-medium text-secondary text-xl md:text-2xl text-center sm:text-left">Payment method</h1>
        <p class="font-hk text-secondary pt-2">All transactions are secure and encrypted</p>
        <div class="mt-6 border border-grey-darker rounded px-4 sm:px-5 py-3">
            <p class="font-hkbold text-secondary text-base font-bold">MPESA Payment Instructions</p>
            <div class="pt-4 pl-4">
                <ul style="list-style: disc">
                    <li>Instruction 1</li>
                    <li>Instruction 2</li>
                    <li>Instruction 3</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="flex flex-col sm:flex-row justify-between items-center pt-8 sm:pt-12">
        <a href="{{ route('buyer.cart') }}"
           class="flex items-center mb-3 sm:mb-0 font-hk group-hover:font-bold  text-sm text-secondary hover:text-primary group transition-colors">
            <i class="bx bx-chevron-left text-secondary group-hover:text-primary pr-2 text-2xl -mb-1 transition-colors"></i>
            Return to Cart
        </a>
        <a href=""
           class="btn btn-outline bg-primary text-white hover:bg-white hover:text-primary">Pay Now</a>
    </div>
</div>
</div>
        <div class="sm:w-2/3 md:w-1/2 lg:w-1/3 bg-grey-light mt-16 lg:mt-0">
            <div class="p-8">
    <h3 class="font-hkbold text-secondary text-2xl pb-3 text-center sm:text-left">Your Order</h3>
    <p class="font-hkbold text-secondary uppercase text-center sm:text-left">PRODUCTS</p>
    <div class="mt-5 mb-8">
        <div class="flex items-center mb-5">
            <div class="w-20 relative mr-3 sm:pr-0">
                <div class="h-20 rounded flex items-center justify-center">
                    <img src="assets/img/unlicensed/purse-1.png"
                         alt="Beautiful Brown image"
                         class="w-12 h-16 object-cover object-center"/>
                    <span
                          class="font-hk text-white text-xs px-2 leading-none absolute top-0 right-0 bg-primary flex items-center justify-center rounded-full -mt-2 -mr-2 h-6 w-6">2</span>
                </div>
            </div>
            <p class="font-hk text-secondary text-lg">Product 1</p>
        </div>
        <div class="flex items-center mb-5">
            <div class="w-20 relative mr-3 sm:pr-0">
                <div class="h-20 rounded flex items-center justify-center">
                    <img src="assets/img/unlicensed/backpack-2.png"
                         alt="Woodie Blake image"
                         class="w-12 h-16 object-cover object-center"/>
                    <span
                          class="font-hk text-white text-xs px-2 leading-none absolute top-0 right-0 bg-primary flex items-center justify-center rounded-full -mt-2 -mr-2 h-6 w-6">2</span>
                </div>
            </div>
            <p class="font-hk text-secondary text-lg">Product 2</p>
        </div>
        <div class="flex items-center mb-5">
            <div class="w-20 relative mr-3 sm:pr-0">
                <div class="h-20 rounded flex items-center justify-center">
                    <img src="assets/img/unlicensed/watch-4.png"
                         alt="Princess image"
                         class="w-12 h-16 object-cover object-center"/>
                    <span
                          class="font-hk text-white text-xs px-2 leading-none absolute top-0 right-0 bg-primary flex items-center justify-center rounded-full -mt-2 -mr-2 h-6 w-6">2</span>
                </div>
            </div>
            <p class="font-hk text-secondary text-lg">Product 3</p>
        </div>
    </div>
    <h4 class="font-hkbold text-secondary pt-1 pb-2">Cart Totals</h4>
    <div class="flex justify-between py-3 border-t-2 border-indigo-500">
        <span class="font-hkbold text-secondary leading-none">Total</span>
        <span class="font-hkbold text-secondary leading-none">$200</span>
    </div>
</div>
        </div>
    </div>
</div>

@endsection
