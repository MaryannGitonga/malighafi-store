@extends('layouts.app')

@section('content')
<div class="container border-t border-grey-dark pt-10 sm:pt-12">
    <div class="flex flex-wrap items-center">
    <a href="{{ route('buyer.cart') }}"
       class="transition-all border-b border-transparent hover:border-primary text-sm text-indigo-500 hover:text-primary font-hk
         font-bold ">
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
       class="transition-all border-b border-transparent hover:border-primary text-sm text-secondary hover:text-primary font-hk
        ">
        Payment
    </a>
    <i class="bx bx-chevron-right text-sm text-transparent px-2"></i>
</div>
    <div class="flex flex-col-reverse lg:flex-row justify-between pb-16 sm:pb-20 lg:pb-24">
        <div class="lg:w-3/5">
            <div class="pt-10">
                <h1 class="font-hkbold text-secondary text-2xl pb-3 text-center sm:text-left">Cart Items</h1>
                <div class="pt-8">
                    <div class="hidden sm:block">
                        <div class="flex justify-between border-b border-grey-darker">
                            <div class="w-1/2 lg:w-3/5 xl:w-1/2 pl-8 sm:pl-12 pb-2">
                                <span class="font-hkbold text-secondary text-sm uppercase">Product Name</span>
                            </div>
                            <div class="w-1/4 sm:w-1/6 lg:w-1/5 xl:w-1/4 pb-2 text-right sm:mr-2 md:mr-18 lg:mr-12 xl:mr-18">
                                <span class="font-hkbold text-secondary text-sm uppercase">Quantity</span>
                            </div>
                            <div class="w-1/4 lg:w-1/5 xl:w-1/4 pb-2 text-right md:pr-10">
                                <span class="font-hkbold text-secondary text-sm uppercase">Price</span>
                            </div>
                        </div>
                    </div>
                    <div class="py-3 border-b border-grey-dark flex-row justify-between items-center mb-0 hidden md:flex">
                        <i class="bx bx-x text-grey-darkest text-2xl sm:text-3xl mr-6 cursor-pointer"></i>
                        <div class="w-1/2 lg:w-3/5 xl:w-1/2 flex flex-row items-center border-b-0 border-grey-dark pt-0 pb-0 text-left">
                            <div class="w-20 mx-0 relative pr-0">
                                <div class="h-20 rounded flex items-center justify-center">
                                    <div class="aspect-w-1 aspect-h-1 w-full">
                                        <img src=""
                                             alt="product image"
                                             class="object-cover"/>
                                    </div>
                                </div>
                            </div>
                            <span class="font-hk text-secondary text-base mt-2 ml-4">Product 1</span>
                        </div>
                        <div class="w-full sm:w-1/5 xl:w-1/4 text-center border-b-0 border-grey-dark pb-0">
                            <div class="mx-auto mr-8 xl:mr-4">
                                <div class="flex justify-center"
                                     x-data="{ productQuantity: 1 }">
                                    <input type="number"
                                           id="quantity-form-desktop"
                                           class="form-input form-quantity rounded-r-none w-16 py-0 px-2 text-center"
                                           x-model="productQuantity"
                                           min="1"/>
                                    <div class="flex flex-col">
                                        <span class="px-1 bg-white border border-l-0 border-grey-darker flex-1 rounded-tr cursor-pointer"
                                              @click="productQuantity++"><i class="bx bxs-up-arrow text-xs text-primary pointer-events-none"></i></span>
                                        <span class="px-1 bg-white flex-1 border border-t-0 border-l-0 rounded-br border-grey-darker cursor-pointer"
                                              @click="productQuantity> 1 ? productQuantity-- : productQuanity=1"><i
                                               class="bx bxs-down-arrow text-xs text-primary pointer-events-none"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-1/4 lg:w-1/5 xl:w-1/4 text-right pr-10 xl:pr-10 pb-4">
                            <span class="font-hk text-secondary">Ksh 1045</span>
                        </div>
                    </div>
                    <div class="flex md:hidden mb-5 pb-5 border-b border-grey-dark items-center justify-center">
                        <div class="relative w-1/3">
                            <div class="aspect-w-1 aspect-h-1 w-full">
                                <img src=""
                                     alt="product image"
                                     class="object-cover"/>
                            </div>
                            <div
                                 class="cursor-pointer absolute top-0 right-0 -mt-2 -mr-2 bg-white border border-grey-dark rounded-full shadow h-8 w-8 flex items-center justify-center">
                                <i class="bx bx-x text-grey-darkest text-xl "></i>
                            </div>
                        </div>
                        <div class="pl-4">
                            <span class="font-hk text-secondary text-base mt-2 font-bold">Product 1</span>
                            <span class="font-hk text-secondary block">Ksh 1045</span>
                            <div class="w-2/3 sm:w-5/6 flex mt-2"
                                 x-data="{ productQuantity: 1 }">
                                <input type="number"
                                       id="quantity-form-mobile"
                                       class="form-input form-quantity rounded-r-none w-12 py-1 px-2 text-center"
                                       x-model="productQuantity"
                                       min="1"/>
                                <div class="flex flex-row">
                                    <span class="px-2 bg-white flex-1 border  border-l-0 border-grey-darker cursor-pointer flex items-center justify-center"
                                          @click="productQuantity> 1 ? productQuantity-- : productQuanity=1"><i
                                           class="bx bxs-down-arrow text-xs text-primary pointer-events-none"></i></span>
                                    <span class="px-2 bg-white border border-l-0 border-grey-darker flex-1 rounded-r cursor-pointer flex items-center justify-center"
                                          @click="productQuantity++">
                                        <i class="bx bxs-up-arrow text-xs text-primary pointer-events-none"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="py-3 border-b border-grey-dark flex-row justify-between items-center mb-0 hidden md:flex">
                        <i class="bx bx-x text-grey-darkest text-2xl sm:text-3xl mr-6 cursor-pointer"></i>
                        <div class="w-1/2 lg:w-3/5 xl:w-1/2 flex flex-row items-center border-b-0 border-grey-dark pt-0 pb-0 text-left">
                            <div class="w-20 mx-0 relative pr-0">
                                <div class="h-20 rounded flex items-center justify-center">
                                    <div class="aspect-w-1 aspect-h-1 w-full">
                                        <img src=""
                                             alt="product image"
                                             class="object-cover"/>
                                    </div>
                                </div>
                            </div>
                            <span class="font-hk text-secondary text-base mt-2 ml-4">Product 2</span>
                        </div>
                        <div class="w-full sm:w-1/5 xl:w-1/4 text-center border-b-0 border-grey-dark pb-0">
                            <div class="mx-auto mr-8 xl:mr-4">
                                <div class="flex justify-center"
                                     x-data="{ productQuantity: 1 }">
                                    <input type="number"
                                           id="quantity-form-desktop"
                                           class="form-input form-quantity rounded-r-none w-16 py-0 px-2 text-center"
                                           x-model="productQuantity"
                                           min="1"/>
                                    <div class="flex flex-col">
                                        <span class="px-1 bg-white border border-l-0 border-grey-darker flex-1 rounded-tr cursor-pointer"
                                              @click="productQuantity++"><i class="bx bxs-up-arrow text-xs text-primary pointer-events-none"></i></span>
                                        <span class="px-1 bg-white flex-1 border border-t-0 border-l-0 rounded-br border-grey-darker cursor-pointer"
                                              @click="productQuantity> 1 ? productQuantity-- : productQuanity=1"><i
                                               class="bx bxs-down-arrow text-xs text-primary pointer-events-none"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-1/4 lg:w-1/5 xl:w-1/4 text-right pr-10 xl:pr-10 pb-4">
                            <span class="font-hk text-secondary">Ksh 2348</span>
                        </div>
                    </div>
                    <div class="flex md:hidden mb-5 pb-5 border-b border-grey-dark items-center justify-center">
                        <div class="relative w-1/3">
                            <div class="aspect-w-1 aspect-h-1 w-full">
                                <img src=""
                                     alt="product image"
                                     class="object-cover"/>
                            </div>
                            <div
                                 class="cursor-pointer absolute top-0 right-0 -mt-2 -mr-2 bg-white border border-grey-dark rounded-full shadow h-8 w-8 flex items-center justify-center">
                                <i class="bx bx-x text-grey-darkest text-xl "></i>
                            </div>
                        </div>
                        <div class="pl-4">
                            <span class="font-hk text-secondary text-base mt-2 font-bold">Product 2</span>
                            <span class="font-hk text-secondary block">Ksh 2348</span>
                            <div class="w-2/3 sm:w-5/6 flex mt-2"
                                 x-data="{ productQuantity: 1 }">
                                <input type="number"
                                       id="quantity-form-mobile"
                                       class="form-input form-quantity rounded-r-none w-12 py-1 px-2 text-center"
                                       x-model="productQuantity"
                                       min="1"/>
                                <div class="flex flex-row">
                                    <span class="px-2 bg-white flex-1 border  border-l-0 border-grey-darker cursor-pointer flex items-center justify-center"
                                          @click="productQuantity> 1 ? productQuantity-- : productQuanity=1"><i
                                           class="bx bxs-down-arrow text-xs text-primary pointer-events-none"></i></span>
                                    <span class="px-2 bg-white border border-l-0 border-grey-darker flex-1 rounded-r cursor-pointer flex items-center justify-center"
                                          @click="productQuantity++">
                                        <i class="bx bxs-up-arrow text-xs text-primary pointer-events-none"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="py-3 border-b border-grey-dark flex-row justify-between items-center mb-0 hidden md:flex">
                        <i class="bx bx-x text-grey-darkest text-2xl sm:text-3xl mr-6 cursor-pointer"></i>
                        <div class="w-1/2 lg:w-3/5 xl:w-1/2 flex flex-row items-center border-b-0 border-grey-dark pt-0 pb-0 text-left">
                            <div class="w-20 mx-0 relative pr-0">
                                <div class="h-20 rounded flex items-center justify-center">
                                    <div class="aspect-w-1 aspect-h-1 w-full">
                                        <img src=""
                                             alt="product image"
                                             class="object-cover"/>
                                    </div>
                                </div>
                            </div>
                            <span class="font-hk text-secondary text-base mt-2 ml-4">Product 3</span>
                        </div>
                        <div class="w-full sm:w-1/5 xl:w-1/4 text-center border-b-0 border-grey-dark pb-0">
                            <div class="mx-auto mr-8 xl:mr-4">
                                <div class="flex justify-center"
                                     x-data="{ productQuantity: 1 }">
                                    <input type="number"
                                           id="quantity-form-desktop"
                                           class="form-input form-quantity rounded-r-none w-16 py-0 px-2 text-center"
                                           x-model="productQuantity"
                                           min="1"/>
                                    <div class="flex flex-col">
                                        <span class="px-1 bg-white border border-l-0 border-grey-darker flex-1 rounded-tr cursor-pointer"
                                              @click="productQuantity++"><i class="bx bxs-up-arrow text-xs text-primary pointer-events-none"></i></span>
                                        <span class="px-1 bg-white flex-1 border border-t-0 border-l-0 rounded-br border-grey-darker cursor-pointer"
                                              @click="productQuantity> 1 ? productQuantity-- : productQuanity=1"><i
                                               class="bx bxs-down-arrow text-xs text-primary pointer-events-none"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-1/4 lg:w-1/5 xl:w-1/4 text-right pr-10 xl:pr-10 pb-4">
                            <span class="font-hk text-secondary">Ksh 3045</span>
                        </div>
                    </div>
                    <div class="flex md:hidden mb-5 pb-5 border-b border-grey-dark items-center justify-center">
                        <div class="relative w-1/3">
                            <div class="aspect-w-1 aspect-h-1 w-full">
                                <img src=""
                                     alt="product image"
                                     class="object-cover"/>
                            </div>
                            <div
                                 class="cursor-pointer absolute top-0 right-0 -mt-2 -mr-2 bg-white border border-grey-dark rounded-full shadow h-8 w-8 flex items-center justify-center">
                                <i class="bx bx-x text-grey-darkest text-xl "></i>
                            </div>
                        </div>
                        <div class="pl-4">
                            <span class="font-hk text-secondary text-base mt-2 font-bold">Product 3</span>
                            <span class="font-hk text-secondary block">Ksh 3045</span>
                            <div class="w-2/3 sm:w-5/6 flex mt-2"
                                 x-data="{ productQuantity: 1 }">
                                <input type="number"
                                       id="quantity-form-mobile"
                                       class="form-input form-quantity rounded-r-none w-12 py-1 px-2 text-center"
                                       x-model="productQuantity"
                                       min="1"/>
                                <div class="flex flex-row">
                                    <span class="px-2 bg-white flex-1 border  border-l-0 border-grey-darker cursor-pointer flex items-center justify-center"
                                          @click="productQuantity> 1 ? productQuantity-- : productQuanity=1"><i
                                           class="bx bxs-down-arrow text-xs text-primary pointer-events-none"></i></span>
                                    <span class="px-2 bg-white border border-l-0 border-grey-darker flex-1 rounded-r cursor-pointer flex items-center justify-center"
                                          @click="productQuantity++">
                                        <i class="bx bxs-up-arrow text-xs text-primary pointer-events-none"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-row sm:flex-row sm:justify-between sm:items-center pt-8 sm:pt-12">
                <a href=""
                   class="btn btn-outline">Continue Shopping</a>
            </div>
        </div>
        <div class="sm:w-2/3 md:w-full lg:w-1/3 mx-auto lg:mx-0 mt-16 lg:mt-0">
            <div class="bg-grey-light py-8 px-8">
                <h4 class="font-hkbold text-secondary text-2xl pb-3 text-center sm:text-left">Cart Totals</h4>
                <div>
                    <p class="font-hkbold text-secondary pt-1 pb-2">Cart Note</p>
                    <p class="font-hk text-secondary text-sm pb-4">Special instructions for us</p>
                    <label for="cart_note"
                           class="block relative h-0 w-0 overflow-hidden">Cart Note</label>
                    <textarea rows="5"
                              placeholder="Enter your text"
                              class="form-textarea"
                              id="cart_note"></textarea>
                </div>
                <div class="mb-12 pt-4">
                    <p class="font-hkbold text-secondary pt-1 pb-2">Cart Total</p>
                    <div class="pt-3 flex justify-between">
                        <span class="font-hkbold text-secondary">Total</span>
                        <span class="font-hkbold text-secondary">Ksh 2000</span>
                    </div>
                </div>
                <a href="{{ route('buyer.checkout-info') }}"
                   class="btn btn-outline bg-primary text-white hover:bg-white hover:text-primary">Proceed to checkout</a>
            </div>
        </div>
    </div>
</div>
@endsection
