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
       class="transition-all border-b border-transparent hover:border-primary text-sm text-indigo-500 hover:text-primary font-hk
         font-bold ">
        Customer information
    </a>
    <i class="bx bx-chevron-right text-sm text-secondary px-2"></i>
    <a href="{{ route('buyer.payment') }}"
       class="transition-all border-b border-transparent hover:border-primary text-sm text-secondary hover:text-primary font-hk
        ">
        Payment
    </a>
    <i class="bx bx-chevron-right text-sm text-transparent px-2"></i>
</div>
            <div class="pt-4 pb-10">
                <h4 class="font-hk font-medium text-secondary text-xl md:text-2xl text-center sm:text-left">Shipping address</h4>
                @foreach ($user as $item)

                <form action="{{ route('cart.update-user')}} " method="POST">
                    @csrf
                    @method('PUT')
                <div class="pt-4 md:pt-5">
                    <div class="flex justify-between">
                        <input type="text"
                               value="{{$item->name}}"
                               class="form-input mb-4 sm:mb-5 mr-2"
                               name="user_name"
                               id="first_name"/>
                        <input type="text"
                               value="{{$item->name}}"
                               placeholder="Confirm Name"
                               class="form-input mb-4 sm:mb-5 ml-1"
                               id="last_name"/>
                    </div>
                    @error('user_name')
                    <div class=" mt-8 space-y-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                    <div class="flex justify-between">
                        <input type="text"
                               value="{{$item->email}}"
                               name="email"
                               class="form-input mb-4 sm:mb-5 mr-2"
                               id="email_address"/>

                        <input type="text"
                               value="{{$item->phone}}"
                               placeholder="Phone number"
                               name="phone"
                               class="form-input mb-4 sm:mb-5 ml-1"
                               id="phone"/>

                    </div>
                    @error('email')
                                    <div class=" mt-8 space-y-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                    @enderror
                    @error('phone')
                                <div class=" mt-8 space-y-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                    @enderror
                    <input type="text"
                           value="{{$item->physical_address}}"
                           placeholder="Physical address"
                           name="physicalAddress"
                           class="form-input mb-4 sm:mb-5"
                           id="address2"/>
                           @error('physicalAddress')
                                <div class=" mt-8 space-y-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                    <input type="text"
                           value="{{$item->county}}"
                           placeholder="County"
                           name="county"
                           class="form-input mb-4 sm:mb-5"
                           id="county"/>
                           @error('county')
                                <div class=" mt-8 space-y-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                    <div class="flex justify-between">
                        <input type="text"
                               value="{{$item->postal_address}}"
                               placeholder="Postal Address"
                               name="postal"
                               class="form-input mb-4 sm:mb-5 mr-2"
                               id="postal_address"/>
                        <input type="number"
                                value="{{$item->zip_code}}"
                               placeholder="Postal code"
                               name="zip"
                               class="form-input mb-4 sm:mb-5 ml-1"
                               id="post_code"/>
                    </div>
                    @error('postal')
                                    <div class=" mt-8 space-y-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                    @enderror
                    @error('zip')
                    <div class=" mt-8 space-y-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                    <div class="flex items-center pt-2">
                        <input type="checkbox"
                               class="form-checkbox"
                               name="save"
                               value="yes"
                               id="save_info"/>
                        <p class="font-hk text-sm pl-3 text-secondary">Save this information for next time</p>
                    </div>
                </div>


                <div class="flex flex-col sm:flex-row justify-between items-center pt-8 sm:pt-12">
                    <a href="{{ route('buyer.cart') }}"
                       class="flex items-center mb-3 sm:mb-0 font-hk group-hover:font-bold  text-sm text-secondary hover:text-primary group transition-all">
                        <i class="bx bx-chevron-left text-secondary group-hover:text-primary pr-2 text-2xl -mb-1 transition-colors"></i>
                        Return to Cart
                    </a>
                    <button
                    type="submit"
                       class="btn btn-outline bg-primary text-white hover:bg-white hover:text-primary">Continue to payment</button>
                </div>
            </div>
        </div>
    </form>
        @endforeach
        <div class="sm:w-2/3 md:w-1/2 lg:w-1/3 bg-grey-light mt-8 lg:mt-0">
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
                          class="font-hk text-white text-xs px-2 leading-none absolute top-0 right-0 bg-primary flex items-center justify-center rounded-full -mt-2 -mr-2 h-6 w-6">2</span>
                </div>
            </div>
            <p class="font-hk text-secondary text-lg">{{$product['name']}}</p>
        </div>
    </div>
    @endforeach
    <h4 class="font-hkbold text-secondary pt-1 pb-2">Cart Totals</h4>
    <div class="flex justify-between py-3 border-t-2 border-indigo-500">
        <span class="font-hkbold text-secondary leading-none">Total</span>
        <span class="font-hkbold text-secondary leading-none">Kshs {{$total_price}}</span>
    </div>
</div>
        </div>
    </div>
</div>
@endsection
