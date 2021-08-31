@extends(Auth::user() == null ? 'layouts.guest': 'layouts.app')

@section('content')

@if (Auth::user() != null)
@if (Auth::user()->roles()->where('role_id', App\Enums\UserType::Administrator)->first() != null)
@if (Auth::user()->roles()->where('role_id', App\Enums\UserType::Administrator)->first()->pivot->status == App\Enums\AccountStatus::Active)
<script type="text/javascript">
    window.location = "/dashboard";//here double curly bracket
</script>
@endif
@elseif (Auth::user()->roles()->where('role_id', App\Enums\UserType::Seller)->first() != null)
@if(Auth::user()->roles()->where('role_id', App\Enums\UserType::Seller)->first()->pivot->status == App\Enums\AccountStatus::Active)
<script type="text/javascript">
    window.location = "/dashboard";//here double curly bracket
</script>
@endif
@endif
@endif

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
                <div class="py-10 flex flex-col sm:flex-row justify-between">
                    <div class="flex items-center justify-start sm:justify-end mt-6 sm:mt-0">
                        <form action="{{ route('search')}}" method="POST" class="px-4 py-3 rounded-md flex items-center w-80">
                            @csrf
                            <input type="text" name="search_name" class="font-hk font-medium text-secondary outline-none border-grey-dark w-full placeholder-grey-darkest focus:ring focus:ring-primary focus:outline-none focus:border-primary focus:border-2" placeholder="Search for a product">
                            <button type="submit" class="flex items-center focus:outline-none focus:border-transparent">
                                <i class="bx bx-search text-primary text-xl ml-4"></i>
                            </button>
                        </form>
                    </div>
                </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-10">
                        @foreach ($products as $product)
                        <div class="w-full relative group lg:last:hidden xl:last:block">
                            <div class="relative rounded flex justify-center items-center">
                                <div class="w-full h-68 bg-center bg-no-repeat bg-cover"
                                    style="background-image:url({{ $product->path }})">
                                </div>
                                <div class="absolute opacity-0 transition-opacity group-hover:opacity-100 flex justify-center items-center py-28 inset-0 group bg-secondary bg-opacity-85">
                                    <a href="{{ route('buyer.cart') }}"
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
                                </div>
                            </div>
                            <div class="flex justify-between items-center pt-6">
                                <div>
                                    <h3 class="font-hk text-base text-secondary">{{ $product->name }}</h3>
                                    <div class="flex items-center">
                                        <p class="font-hk text-sm text-indigo-700 ml-2">In Stock</p>
                                    </div>
                                </div>
                                <span class="font-hk font-bold text-primary text-xl">Ksh {{ number_format($product->price) }}</span>
                            </div>
                        </div>
                        @endforeach
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
