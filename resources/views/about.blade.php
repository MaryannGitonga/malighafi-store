@extends(Auth::user() == null ? 'layouts.guest': 'layouts.app')

@section('content')
<div class="container">
    <div class="py-10 lg:py-10">
        <span class="font-hk text-primary text-sm sm:text-base md:text-lg uppercase text-center block mb-3">Our Story</span>
        <h1 class="text-primary text-2xl sm:text-3xl md:text-4.5xl lg:text-5xl text-center">Get To Know Us</h1>
        <p class="font-hk text-secondary text-base text-center mt-6 lg:mt-10 mb-12 lg:w-3/4 mx-auto">Charles and Linda, tech gurus, wanted to start a construction company in Kenya. As they both were new in Kenya, they saw it hard to obtain materials for their new start-up. They often spent time asking around to get pointed to where to check, and who to ask. These inconveniences motivated them to find a solution and Malighafi Store was born. Malighafi Store was created as an e-commerce solution for buyers and sellers of bulk raw materials. Our platform allows for direct transactions between buyers and sellers, while minimizing third party involvements. Go on, buy something!!</p>
    </div>
    <div>
        <div class="w-5/6 sm:w-3/4 md:w-5/6 mx-auto flex flex-col md:flex-row justify-between py-16 md:py-20 text-center sm:text-left">
            <div class="md:w-1/2">
                <div class="px-4">
                    <h4 class="font-medium text-primary text-3xl">Mission Statement</h4>
                    <p class="font-hk text-base pt-6 md:pt-8">To be Kenya’s most customer-centric ecommerce platform, where buyers can find and discover any raw material they might want to buy online</p>
                </div>
            </div>
            <div class="md:w-1/2 pt-12 md:pt-0">
                <div class="px-4">
                    <h4 class="font-medium text-primary text-3xl">Vision Statement</h4>
                    <p class="font-hk text-base pt-6 md:pt-8">Better and more efficient business transactions between buyers and sellers of raw materials in Kenya while maximizing the availble internet connectivity resources.</p>
</p>
                </div>
            </div>
        </div>
    </div>
</div>
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
                <a href="{{ route('shop') }}"
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
