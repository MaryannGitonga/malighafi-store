@extends(Auth::user() == null ? 'layouts.guest': 'layouts.app')

@section('content')

<div class="bg-indigo-500 bg-opacity-50">
    <div class="container py-16 sm:py-20 md:py-24">
        <div class="w-5/6 mx-auto flex flex-col lg:flex-row items-center justify-between">
            <div class="text-center lg:text-left">
                <h4 class="font-hk font-bold text-white text-xl pb-8">Contact</h4>
                <ul class="list-reset">
                    <li class="pb-2 block">
                        <a href="mailto:info@malighafistore.com"
                           class="font-hk text-white transition-colors hover:text-primary text-base tracking-wide">info@malighafistore.com</a>
                    </li>
                    <li class="pb-2 block">
                        <a href="tel:0123234222"
                           class="font-hk text-white transition-colors hover:text-primary text-base tracking-wide">0123 234 222</a>
                    </li>
                </ul>
            </div>
            <div class="text-center py-16 lg:py-0">
                <a href="{{ route('home') }}"
                style="font-family: 'Source Sans Pro', sans-serif; color: #5a67da;" class="lg:text-5xl md:text-4xl sm:text-2xl">Malighafi Store</a>
                <div class="flex items-center justify-center pt-5">
                    <a href="https://www.google.com/"
                       class="group">
                        <div class="bg-white group-hover:bg-primary rounded-full px-2 py-2 flex items-center mr-5 transition-colors">
                            <i class="bx bxl-facebook text-secondary transition-colors group-hover:text-white"></i>
                        </div>
                    </a>
                    <a href="https://www.google.com/"
                       class="group">
                        <div class="bg-white group-hover:bg-primary rounded-full px-2 py-2 flex items-center mr-5 transition-colors">
                            <i class="bx bxl-twitter text-secondary transition-colors group-hover:text-white"></i>
                        </div>
                    </a>
                    <a href="https://www.google.com/"
                       class="group">
                        <div class="bg-white group-hover:bg-primary rounded-full px-2 py-2 flex items-center mr-5 transition-colors">
                            <i class="bx bxl-instagram text-secondary transition-colors group-hover:text-white"></i>
                        </div>
                    </a>
                    <a href="https://www.google.com/"
                       class="group">
                        <div class="bg-white group-hover:bg-primary rounded-full px-2 py-2 flex items-center mr-5 transition-colors">
                            <i class="bx bxl-pinterest text-secondary transition-colors group-hover:text-white"></i>
                        </div>
                    </a>
                </div>
            </div>
            <div class="text-center lg:text-left">
                <h4 class="font-hk font-bold text-white text-xl pb-8">Links</h4>
                <ul class="list-reset">
                    <li class="pb-2 block">
                        <a href=""
                           class="font-hk transition-colors text-white hover:text-primary text-base tracking-wide">Shop</a>
                    </li>
                    <li class="pb-2 block">
                        <a href=""
                           class="font-hk transition-colors text-white hover:text-primary text-base tracking-wide">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

