@extends('layouts.app')

@section('content')
<div class="container">
    <div class="pt-16 pb-24 flex flex-col lg:flex-row justify-between -mx-5">
        <div class="lg:w-1/2 flex flex-col-reverse sm:flex-row-reverse lg:flex-row justify-between px-5">
            <div class="w-full relative pb-5 sm:pb-0">
                <div class="bg-v-pink border border-grey relative rounded flex items-center justify-center aspect-w-1 aspect-h-1">
                    <img class="object-cover"
                         alt="product image"
                         src="{{ asset($product->path) }}"/>
                </div>
            </div>
        </div>
        <div class="lg:w-1/2 pt-8 lg:pt-0 px-5">
            <div class="border-b border-grey-dark mb-8">
                <div class="flex items-center">
                    <h2 class=" font-butler text-3xl md:text-4xl lg:text-4.5xl">{{ $product->name }}</h2>
                    <p class="bg-primary rounded-full ml-8 px-5 py-2 leading-none font-hk font-bold text-white uppercase text-sm">20% off</p>
                </div>
                <div class="flex items-center pt-3">
                    <span class="font-hk text-secondary text-2xl"> Ksh {{ number_format($product->price) }}</span>
                    {{-- <span class="font-hk text-grey-darker text-xl line-through pl-5">$35.0</span> --}}
                </div>
                <div class="flex items-center pt-3 pb-8">
                    <div class="flex items-center">
                        <i class="bx bxs-star text-primary"></i>
                        <i class="bx bxs-star text-primary"></i>
                        <i class="bx bxs-star text-primary"></i>
                        <i class="bx bxs-star text-primary"></i>
                        <i class="bx bxs-star text-primary"></i>
                    </div>
                    <span class="font-hk text-sm text-secondary ml-2">(45)</span>
                </div>
            </div>
            <div class="flex pb-5">
                <p class="font-hk text-secondary">Availability:</p>
                <p class="font-hkbold text-v-green pl-3">In Stock</p>
            </div>
            <p class="font-hk text-secondary pb-5">{{ $product->description }}</p>
            <div class="flex items-center justify-between pb-4">
                <div class="w-1/3 sm:w-1/5">
                    <p class="font-hk text-secondary">Size : <span class="text-primary font-bold">{{ $product->unit->name}}</span></p>
                </div>
            </div>
            <div class="flex items-center justify-between pb-8">
                <div class="w-1/3 sm:w-1/5">
                    <p class="font-hk text-secondary">Quantity</p>
                </div>
                <div class="w-2/3 sm:w-5/6 flex"
                     x-data="{ productQuantity: 1 }">
                    <label for="quantity-form"
                           class="block relative h-0 w-0 overflow-hidden">Quantity form</label>
                    <input type="number"
                           id="quantity-form"
                           class="form-input form-quantity rounded-r-none w-16 py-0 px-2 text-center"
                           x-model="productQuantity"
                           min="1"/>
                    <div class="flex flex-col">
                        <span class="px-1 bg-white border border-l-0 border-grey-darker flex-1 rounded-tr cursor-pointer"
                              @click="productQuantity++">
                            <i class="bx bxs-up-arrow text-xs text-primary pointer-events-none"></i>
                        </span>
                        <span class="px-1 bg-white flex-1 border border-t-0 border-l-0 rounded-br border-grey-darker cursor-pointer"
                              @click="productQuantity> 1 ? productQuantity-- : productQuantity=1">
                            <i class="bx bxs-down-arrow text-xs text-primary pointer-events-none"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="flex pb-8 group">
                <a href=""
                   class="btn btn-outline mr-4 md:mr-6">Add to cart</a>
                <a href=""
                   class="btn btn-outline bg-primary text-white hover:bg-white hover:text-primary">BUY NOW</a>
            </div>
            <p class="font-hk text-secondary">
                <span class="pr-2">Category:</span> {{ Illuminate\Support\Str::of($product->category->name)->ucfirst()}}
            </p>
        </div>
    </div>
    <div class="pb-16 sm:pb-20 md:pb-24"
         x-data="{ activeTab: 'description' }">
        <div class="tabs flex flex-col sm:flex-row"
             role="tablist">
            <span @click="activeTab = 'description'"
                  class="tab-item bg-white hover:bg-grey-light px-10 py-5 text-center sm:text-left border-t-2 border-transparent font-hk font-bold  text-secondary cursor-pointer transition-colors"
                  :class="{ 'active': activeTab=== 'description' }">
                Description
            </span>
            <span @click="activeTab = 'additional-information'"
                  class="tab-item bg-white hover:bg-grey-light px-10 py-5 text-center sm:text-left border-t-2 border-transparent font-hk font-bold  text-secondary cursor-pointer transition-colors"
                  :class="{ 'active': activeTab=== 'additional-information' }">
                Additional Information
            </span>
            <span @click="activeTab = 'reviews'"
                  class="tab-item bg-white hover:bg-grey-light px-10 py-5 text-center sm:text-left border-t-2 border-transparent font-hk font-bold  text-secondary cursor-pointer transition-colors"
                  :class="{ 'active': activeTab=== 'reviews' }">
                Reviews
            </span>
        </div>
        <div class="tab-content relative">
            <div :class="{ 'active': activeTab=== 'description' }"
                 class="tab-pane bg-grey-light py-10 md:py-16 transition-opacity"
                 role="tabpanel">
                <div class="w-5/6 mx-auto text-center sm:text-left">
                    <div class="font-hk text-secondary text-base">
                        {{ $product->description }}
                    </div>
                </div>
            </div>
            <div :class="{ 'active': activeTab=== 'additional-information' }"
                 class="tab-pane bg-grey-light py-10 md:py-16 transition-opacity"
                 role="tabpanel">
                <div class="w-5/6 mx-auto">
                    <div class="font-hk text-secondary text-base">
                        {{ $product->description }}
                    </div>
                </div>
            </div>
            <div :class="{ 'active': activeTab=== 'reviews' }"
                 class="tab-pane bg-grey-light py-10 md:py-16 transition-opacity"
                 role="tabpanel">
                <div class="w-5/6 mx-auto border-b border-grey-darker pb-8 text-center sm:text-left">
                    <div class="flex justify-center sm:justify-start items-center pt-3 xl:pt-5">
                        <i class="bx bxs-star text-primary"></i>
                        <i class="bx bxs-star text-primary"></i>
                        <i class="bx bxs-star text-primary"></i>
                        <i class="bx bxs-star text-primary"></i>
                        <i class="bx bxs-star text-primary"></i>
                    </div>
                    <p class="font-hkbold text-secondary text-lg pt-3">Perfect for everyday use</p>
                    <p class="font-hk text-secondary pt-4 lg:w-5/6 xl:w-2/3">I loooveeeee this product!!! It feels so soft and smells like real leather!!! I ordered this fancy backpack looking for something that can be used at work and, at the same time, after work; and I found it.  Honestly.. Amazing!!</p>
                    <div class="flex justify-center sm:justify-start items-center pt-3">
                        <p class="font-hk text-grey-darkest text-sm"><span>By</span> Melanie Ashwood</p>
                        <span class="font-hk text-grey-darkest text-sm block px-4">.</span>
                        <p class="font-hk text-grey-darkest text-sm">6 days ago</p>
                    </div>
                </div>
                <div class="w-5/6 mx-auto border-b border-transparent pb-8 text-center sm:text-left">
                    <div class="flex justify-center sm:justify-start items-center pt-3 xl:pt-5">
                        <i class="bx bxs-star text-primary"></i>
                        <i class="bx bxs-star text-primary"></i>
                        <i class="bx bxs-star text-primary"></i>
                        <i class="bx bxs-star text-primary"></i>
                        <i class="bx bxs-star text-primary"></i>
                    </div>
                    <p class="font-hkbold text-secondary text-lg pt-3">Gift for my girlfriend</p>
                    <p class="font-hk text-secondary pt-4 lg:w-5/6 xl:w-2/3">I paid this thing thinking about my girlfriend’s birthday present, however I had my doubts cuz’ she is kind of picky. But Seriously, from now on, Elyssi is my best friend! She loved it!! She’s crazy about it!  DISCLAIMER: It is smaller than it appears. </p>
                    <div class="flex justify-center sm:justify-start items-center pt-3">
                        <p class="font-hk text-grey-darkest text-sm"><span>By</span> Jake Houston</p>
                        <span class="font-hk text-grey-darkest text-sm block px-4">.</span>
                        <p class="font-hk text-grey-darkest text-sm">4 days ago</p>
                    </div>
                </div>
                <form class="w-5/6 mx-auto">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-10 gap-y-5 pt-10">
                        <div class="w-full">
                            <label class="font-hk text-secondary text-sm block mb-2"
                                   for="name">Name</label>
                            <input type="text"
                                   placeholder="Enter your Name"
                                   class="form-input"
                                   id="name"/>
                        </div>
                        <div class="w-full pt-10 sm:pt-0">
                            <label class="font-hk text-secondary text-sm block mb-2"
                                   for="email">Email address</label>
                            <input type="email"
                                   placeholder="Enter your email"
                                   class="form-input "
                                   id="email"/>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-10 gap-y-5 pt-10">
                        <div class="w-full">
                            <label class="font-hk text-secondary text-sm block mb-2"
                                   for="review_title">Review Title</label>
                            <input type="text"
                                   placeholder="Enter your review title"
                                   class="form-input "
                                   id="review_title"/>
                        </div>
                        <div class="w-full pt-10 sm:pt-0">
                            <label class="font-hk text-secondary text-sm block mb-2">Rating</label>
                            <div class="flex pt-4 stars">
                                <input class="star star-5 bx bxs-star" id="star-5" type="radio" name="star"/>
                                <label class="star star-5 bx bxs-star" for="star-5"></label>
                                <input class="star star-4 bx bxs-star" id="star-4" type="radio" name="star"/>
                                <label class="star star-4 bx bxs-star" for="star-4"></label>
                                <input class="star star-3 bx bxs-star" id="star-3" type="radio" name="star"/>
                                <label class="star star-3 bx bxs-star" for="star-3"></label>
                                <input class="star star-2 bx bxs-star" id="star-2" type="radio" name="star"/>
                                <label class="star star-2 bx bxs-star" for="star-2"></label>
                                <input class="star star-1 bx bxs-star" id="star-1" type="radio" name="star"/>
                                <label class="star star-1 bx bxs-star" for="star-1"></label>
                            </div>
                        </div>
                    </div>
                    <div class="sm:w-12/25 pt-10">
                        <label for="message"
                               class="font-hk text-secondary text-sm block mb-2">Your Review</label>
                        <textarea placeholder="Write your review here"
                                  class="form-textarea h-28"
                                  id="message"></textarea>
                    </div>
                </form>
                <div class="w-5/6 mx-auto pt-8 md:pt-10 pb-4 text-center sm:text-left">
                    <a href="/"
                       class="btn btn-outline bg-primary text-white hover:bg-white hover:text-primary">Submit Review</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
