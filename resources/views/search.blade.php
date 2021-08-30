@extends(Auth::user() == null ? 'layouts.guest': 'layouts.app')

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
                    <div class="flex items-center justify-start mr-8 mb-8">
                        <a href="{{ route('shop') }}" class="relative w-50 flex justify-center mt-8 py-2 px-4 border border-transparent text-sm font-small rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            ← Back
                        </a>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-10">
                        @if (count($products) == 0)
                            <p class="ml-4">No items found for this search</p>
                        @else
                        @foreach ($products as $product)
                        <div class="w-full relative group lg:last:hidden xl:last:block">
                            <div class="relative rounded flex justify-center items-center">
                                <div class="w-full h-68 bg-center bg-no-repeat bg-cover"
                                    style="background-image:url({{ $product->path }})">
                                </div>
                                <span
                                    class="absolute top-0 right-0 bg-white px-5 py-1 mt-4 mr-4 rounded-full font-hk font-bold  bg-indigo-700 text-white text-sm uppercase tracking-wide">New</span>
                                <div class="absolute opacity-0 transition-opacity group-hover:opacity-100 flex justify-center items-center py-28 inset-0 group bg-secondary bg-opacity-85">
                                    <a href=""
                                    class="bg-white hover:bg-gray-300 rounded-full px-3 py-3 flex items-center transition-all mr-3">
                                        <img src="assets/img/icons/icon-cart.svg "
                                            class="h-6 w-6"
                                            alt="icon cart"/>
                                    </a>
                                    <a href="{{ route('products.show', $product->id) }}"
                                    class="bg-white hover:bg-gray-300 rounded-full px-3 py-3 flex items-center transition-all mr-3">
                                        <img src="assets/img/icons/icon-search.svg"
                                            class="h-6 w-6"
                                            alt="icon search"/>
                                    </a>
                                    <a href=""
                                    class="bg-white hover:bg-gray-300  rounded-full px-3 py-3 flex items-center transition-all ">
                                        <img src="assets/img/icons/icon-heart.svg"
                                            class="h-6 w-6"
                                            alt="icon heart"/>
                                    </a>
                                </div>
                            </div>
                            <div class="flex justify-between items-center pt-6">
                                <div>
                                    <h3 class="font-hk text-base text-secondary">{{ $product->name }}</h3>
                                    <div class="flex items-center">
                                        <div class="flex items-center">
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-primary"></i>
                                            <i class="bx bxs-star text-gray-400"></i>
                                        </div>
                                        <p class="font-hk text-sm text-indigo-700 ml-2">In Stock</p>
                                    </div>
                                </div>
                                <span class="font-hk font-bold text-primary text-xl">Ksh {{ number_format($product->price) }}</span>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                    <div class="py-16 flex justify-center mx-auto">
                        <span class="font-hk font-semibold text-grey-darkest transition-colors hover:text-black pr-5 cursor-pointer">Previous</span>
                <span
                      class="font-hk font-semibold text-black transition-colors hover:text-white text-sm hover:bg-primary h-6 w-6 rounded-full flex items-center justify-center mr-3 cursor-pointer">1</span>
                <span
                      class="font-hk font-semibold text-black transition-colors hover:text-white text-sm hover:bg-primary h-6 w-6 rounded-full flex items-center justify-center mr-3 cursor-pointer">2</span>
                <span
                      class="font-hk font-semibold text-black transition-colors hover:text-white text-sm hover:bg-primary h-6 w-6 rounded-full flex items-center justify-center mr-3 cursor-pointer">3</span>
                <span class="font-hk font-semibold text-grey-darkest transition-colors hover:text-black pl-2 cursor-pointer">Next</span>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
