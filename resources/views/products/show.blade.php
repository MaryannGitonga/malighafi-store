@extends(Auth::user() == null ? 'layouts.guest': 'layouts.app')

@section('content')
<div class="container">
    <form class="pt-16 pb-24 flex flex-col lg:flex-row justify-between -mx-5" action="{{route('carts.store')}}" method="POST">
        @csrf
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
                </div>
                <div class="flex items-center pt-3">
                    <span class="font-hk text-secondary text-2xl"> Ksh {{ number_format($product->price) }}</span>
                    {{-- <span class="font-hk text-grey-darker text-xl line-through pl-5">$35.0</span> --}}
                </div>
                <div class="flex items-center pt-3 pb-8">
                    <div class="flex items-center">
                        @if ($review_stars == 5)
                            <i class="bx bxs-star text-primary"></i>
                            <i class="bx bxs-star text-primary"></i>
                            <i class="bx bxs-star text-primary"></i>
                            <i class="bx bxs-star text-primary"></i>
                            <i class="bx bxs-star text-primary"></i>
                        @elseif ($review_stars == 4)
                            <i class="bx bxs-star text-primary"></i>
                            <i class="bx bxs-star text-primary"></i>
                            <i class="bx bxs-star text-primary"></i>
                            <i class="bx bxs-star text-primary"></i>
                            <i class="bx bxs-star text-gray-400"></i>
                        @elseif ($review_stars == 3)
                            <i class="bx bxs-star text-primary"></i>
                            <i class="bx bxs-star text-primary"></i>
                            <i class="bx bxs-star text-primary"></i>
                            <i class="bx bxs-star text-gray-400"></i>
                            <i class="bx bxs-star text-gray-400"></i>
                        @elseif ($review_stars == 2)
                            <i class="bx bxs-star text-primary"></i>
                            <i class="bx bxs-star text-primary"></i>
                            <i class="bx bxs-star text-gray-400"></i>
                            <i class="bx bxs-star text-gray-400"></i>
                            <i class="bx bxs-star text-gray-400"></i>
                        @elseif ($review_stars == 1)
                            <i class="bx bxs-star text-primary"></i>
                            <i class="bx bxs-star text-gray-400"></i>
                            <i class="bx bxs-star text-gray-400"></i>
                            <i class="bx bxs-star text-gray-400"></i>
                            <i class="bx bxs-star text-gray-400"></i>
                        @else
                            <i class="bx bxs-star text-gray-400"></i>
                            <i class="bx bxs-star text-gray-400"></i>
                            <i class="bx bxs-star text-gray-400"></i>
                            <i class="bx bxs-star text-gray-400"></i>
                            <i class="bx bxs-star text-gray-400"></i>
                        @endif
                    </div>
                    <span class="font-hk text-sm text-secondary ml-2">({{ count($reviews) }})</span>
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
                           class="block relative h-0 w-0 overflow-hidden">Quantity</label>
                    <input type="number"
                           id="quantity-form"
                           name="quantity"
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
                    <div class="hidden">
                        <input type="text" value="{{$product->id}}" name="product">
                    </div>
                </div>
            </div>
            <div class="flex pb-8 group">
                @if ($exists)
                    <p>You already have this item in the cart.</p>
                @else
                <button type="submit"
                   class="btn btn-outline bg-primary text-white hover:bg-white hover:text-primary">Add to Cart</button>
                @endif
            </div>
            <p class="font-hk text-secondary">
                <span class="pr-2">Category:</span> <span class="font-bold text-primary">{{ Illuminate\Support\Str::of($product->category->name)->ucfirst()}}</span>
            </p>
        </div>
    </form>
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
    <div class="pb-16 sm:pb-20 md:pb-24"
         x-data="{ activeTab: 'reviews' }">
        <div class="tabs flex flex-col sm:flex-row"
             role="tablist">
             <span @click="activeTab = 'reviews'"
                  class="tab-item bg-white hover:bg-grey-light px-10 py-5 text-center sm:text-left border-t-2 border-transparent font-hk font-bold  text-secondary cursor-pointer transition-colors"
                  :class="{ 'active': activeTab=== 'reviews' }">
                Reviews
            </span>
        </div>
        <div class="tab-content relative">
            <div :class="{ 'active': activeTab=== 'reviews' }"
                 class="tab-pane bg-grey-light py-10 md:py-16 transition-opacity"
                 role="tabpanel">
                @if (count($reviews) != 0)
                @foreach ($reviews as $review)
                <div class="w-5/6 mx-auto border-b border-grey-darker pb-8 text-center sm:text-left">
                    <div class="flex justify-center sm:justify-start items-center pt-3 xl:pt-5">
                        @if ($review->rating == 5)
                            <i class="bx bxs-star text-primary"></i>
                            <i class="bx bxs-star text-primary"></i>
                            <i class="bx bxs-star text-primary"></i>
                            <i class="bx bxs-star text-primary"></i>
                            <i class="bx bxs-star text-primary"></i>
                        @elseif ($review->rating == 4)
                            <i class="bx bxs-star text-primary"></i>
                            <i class="bx bxs-star text-primary"></i>
                            <i class="bx bxs-star text-primary"></i>
                            <i class="bx bxs-star text-primary"></i>
                            <i class="bx bxs-star text-gray-400"></i>
                        @elseif ($review->rating == 3)
                            <i class="bx bxs-star text-primary"></i>
                            <i class="bx bxs-star text-primary"></i>
                            <i class="bx bxs-star text-primary"></i>
                            <i class="bx bxs-star text-gray-400"></i>
                            <i class="bx bxs-star text-gray-400"></i>
                        @elseif ($review->rating == 2)
                            <i class="bx bxs-star text-primary"></i>
                            <i class="bx bxs-star text-primary"></i>
                            <i class="bx bxs-star text-gray-400"></i>
                            <i class="bx bxs-star text-gray-400"></i>
                            <i class="bx bxs-star text-gray-400"></i>
                        @elseif ($review->rating == 1)
                            <i class="bx bxs-star text-primary"></i>
                            <i class="bx bxs-star text-gray-400"></i>
                            <i class="bx bxs-star text-gray-400"></i>
                            <i class="bx bxs-star text-gray-400"></i>
                            <i class="bx bxs-star text-gray-400"></i>
                        @else
                            <i class="bx bxs-star text-gray-400"></i>
                            <i class="bx bxs-star text-gray-400"></i>
                            <i class="bx bxs-star text-gray-400"></i>
                            <i class="bx bxs-star text-gray-400"></i>
                            <i class="bx bxs-star text-gray-400"></i>
                        @endif
                    </div>
                    <p class="font-hkbold text-secondary text-lg pt-3">{{$review->title}}</p>
                    <p class="font-hk text-secondary pt-4 lg:w-5/6 xl:w-2/3">{{$review->description}} </p>
                    <div class="flex justify-center sm:justify-start items-center pt-3">
                        <p class="font-hk text-grey-darkest text-sm"><span>By</span> {{$review->user->name}}</p>
                        <span class="font-hk text-grey-darkest text-sm block px-4">.</span>
                        <p class="font-hk text-grey-darkest text-sm">{{$review->reviewed_at}}</p>
                    </div>
                </div>
                @endforeach
                @else
                <p class="w-5/6 mx-auto">This item has not been reviewed yet.</p>
                @endif

                @auth
                    @if (Auth::user()->roles()->where('role_id', App\Enums\UserType::Buyer)->first() != null)
                    @if (Auth::user()->roles()->where('role_id', App\Enums\UserType::Buyer)->first()->pivot->status == App\Enums\AccountStatus::Active)
                    <form class="w-5/6 mx-auto" method="POST" action="{{route('reviews.store')}}">
                        @csrf
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-10 gap-y-5 pt-10">
                            <div class="w-full">
                                <label class="font-hk text-secondary text-sm block mb-2"
                                    for="review_title">Review Title</label>
                                <input type="text"
                                    name="title"
                                    placeholder="Enter your review title"
                                    class="form-input "
                                    id="review_title"/>
                            </div>
                            <div class="w-full pt-10 sm:pt-0">
                                <label class="font-hk text-secondary text-sm block mb-2">Rating</label>
                                <div class="flex pt-4 stars">
                                    <input class="star star-5 bx bxs-star" id="star-5" type="radio" name="star" value=5>
                                    <label class="star star-5 bx bxs-star" for="star-5"></label>
                                    <input class="star star-4 bx bxs-star" id="star-4" type="radio" name="star" value=4>
                                    <label class="star star-4 bx bxs-star" for="star-4"></label>
                                    <input class="star star-3 bx bxs-star" id="star-3" type="radio" name="star" value=3>
                                    <label class="star star-3 bx bxs-star" for="star-3"></label>
                                    <input class="star star-2 bx bxs-star" id="star-2" type="radio" name="star" value=2>
                                    <label class="star star-2 bx bxs-star" for="star-2"></label>
                                    <input class="star star-1 bx bxs-star" id="star-1" type="radio" name="star" value=1>
                                    <label class="star star-1 bx bxs-star" for="star-1"></label>
                                </div>
                            </div>
                        </div>
                        <div class="sm:w-12/25 pt-10">
                            <label for="message"
                                class="font-hk text-secondary text-sm block mb-2">Your Review</label>
                            <textarea placeholder="Write your review here"
                                    name="description"
                                    class="form-textarea h-28"
                                    id="message"></textarea>
                        </div>
                        <input type="hidden" value="{{$product->id}}" name="product_id">
                        <div class="w-6/6 mx-auto pt-8 md:pt-10 pb-4 text-center sm:text-left">
                            <button
                            class="btn btn-outline bg-primary text-white hover:bg-white hover:text-primary">Submit Review</button>
                        </div>
                    </form>
                    @endif
                    @endif
                @endauth
            </div>
        </div>
    </div>
</div>
@endsection
