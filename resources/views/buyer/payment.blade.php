@extends('layouts.app')

@section('content')

<div class="container border-t border-grey-dark">
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
                <p class="font-hk text-secondary">{{$user_details->email}}</p>
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
                <p class="font-hk text-secondary">{{$user_details->physical_address}}</p>
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
                    <li>Confirm that your order details and your MPESA Phone Number is correct.</li>
                    <li>Click "Pay Now"</li>
                    <li>After a few seconds, MPESA will prompt you to enter your MPESA PIN on your phone</li>
                    <li>Enter your MPESA PIN to complete the payment</li>
                    <li>Once your payment is verified, you will be notified.</li>
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
    </div>
</div>
</div>
        <div class="sm:w-2/3 md:w-1/2 lg:w-1/3 bg-grey-light mt-16 lg:mt-0">
            <div class="p-8">
    <h3 class="font-hkbold text-secondary text-2xl pb-3 text-center sm:text-left">Your Order</h3>
    <p class="font-hkbold text-secondary uppercase text-center sm:text-left">PRODUCTS</p>
    @foreach ($products as $product)
    <div class="mt-5 mb-8">
        <div class="flex items-center mb-5">
            <div class="w-20 relative mr-3 sm:pr-0">
                <div class="h-20 rounded flex items-center justify-center">
                    <img src="{{asset($product['image'])}}"
                         alt="Beautiful Brown image"
                         class="w-12 h-16 object-cover object-center"/>
                    <span
                          class="font-hk text-white text-xs px-2 leading-none absolute top-0 right-0 bg-primary flex items-center justify-center rounded-full -mt-2 -mr-2 h-6 w-6">{{ $product['quantity'] }}</span>
                </div>
            </div>
            <p class="font-hk text-secondary text-lg">{{$product['name']}}</p>
        </div>


        </div>
    </div>
    @endforeach
    <h4 class="font-hkbold text-secondary pt-1 pb-2">Cart Totals</h4>
    <div class="flex justify-between py-3 border-t-2 border-indigo-500">
        <span class="font-hkbold text-secondary leading-none">Total</span>
        <span class="font-hkbold text-secondary leading-none">{{$total_price}}</span>
    </div>
    <form method="POST" action="{{route('stk')}}">
        @csrf
        <p class="font-hkbold text-secondary pt-1 pb-2">Cart Note</p>
        <p class="font-hk text-secondary text-sm pb-4">Special instructions for us</p>
        <label for="cart_note"
               class="block relative h-0 w-0 overflow-hidden">Cart Note</label>
        <textarea rows="5"
                  placeholder="Enter your text"
                  name="description"
                  class="form-textarea"
                  id="cart_note"></textarea>
        <input type="hidden" name="amount" id="amount" value="{{$total_price}}">
        <button type="submit"
           class="btn btn-outline bg-primary text-white hover:bg-white hover:text-primary">Pay Now</button>
    </form>

</div>
        </div>
    </div>
</div>

@endsection
