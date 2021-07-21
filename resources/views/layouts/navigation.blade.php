  <div class="container relative">
    <div class="shadow-xs py-6 lg:py-10 z-50 relative">
        <div class="flex justify-between items-center">
            <div class="flex items-center">
                <div class="block lg:hidden">
                    <i class="bx bx-menu text-indigo-500 text-4xl"
                       @click="mobileMenu = !mobileMenu"></i>
                </div>
                @auth
                <button @click="mobileSearch = !mobileSearch"
                      class="cursor-pointer border-2 transition-colors border-transparent hover:border-indigo-500 rounded-full p-2 sm:p-4 ml-2 sm:ml-3 md:ml-5 lg:mr-8 group focus:outline-none">
                    <img src="{{ asset('assets/img/icons/icon-search.svg') }}"
                         class="w-5 sm:w-6 md:w-8 h-5 sm:h-6 md:h-8 block group-hover:hidden"
                         alt="icon search"/>
                    <img src="{{ asset('assets/img/icons/icon-search-hover.svg') }}"
                         class="w-5 sm:w-6 md:w-8 h-5 sm:h-6 md:h-8 hidden group-hover:block"
                         alt="icon search hover"/>
                </button>
                <a href="account/wishlist.html"
                   class="border-2 transition-all border-transparent hover:border-indigo-500 rounded-full p-2 sm:p-4 group hidden lg:block">
                    <img src="{{ asset('assets/img/icons/icon-heart.svg') }}"
                         class="w-5 sm:w-6 md:w-8 h-5 sm:h-6 md:h-8 block group-hover:hidden"
                         alt="icon heart"/>
                    <img src="{{ asset('assets/img/icons/icon-heart-hover.svg') }}"
                         class="w-5 sm:w-6 md:w-8 h-5 sm:h-6 md:h-8 hidden group-hover:block"
                         alt="icon heart hover"/>
                </a>
                @endauth
            </div>
            <a href="/">
                <div class="h-auto flex items-center logo {{ Auth::user() == null ? "mr-80 pr-64" : ""}}">
                    <h1 class="" style="font-family: 'Source Sans Pro', sans-serif; color: #4f46e5; font-size: 50px">Malighafi Store</h1>
                </div>
            </a>
            @auth
                <div class="flex items-center">
                    <a href="{{ route('buyer.profile') }}"
                    class="border-2 transition-all border-transparent hover:border-indigo-500 rounded-full p-2 sm:p-4 group">
                        <img src="{{ asset('assets/img/icons/icon-user.svg') }}"
                            class="w-5 sm:w-6 md:w-8 h-5 sm:h-6 md:h-8 block group-hover:hidden"
                            alt="icon user"/>
                        <img src="{{ asset('assets/img/icons/icon-user-hover.svg') }}"
                            class="w-5 sm:w-6 md:w-8 h-5 sm:h-6 md:h-8 hidden group-hover:block"
                            alt="icon user hover"/>
                    </a>
                    <a href="cart/index.html"
                    class="hidden lg:block border-2 transition-all border-transparent hover:border-indigo-500 rounded-full p-2 sm:p-4 ml-2 sm:ml-3 md:ml-5 lg:ml-8 group">
                        <img src="{{ asset('assets/img/icons/icon-cart.svg') }}"
                            class="w-5 sm:w-6 md:w-8 h-5 sm:h-6 md:h-8 block group-hover:hidden"
                            alt="icon cart"/>
                        <img src="{{ asset('assets/img/icons/icon-cart-hover.svg') }}"
                            class="w-5 sm:w-6 md:w-8 h-5 sm:h-6 md:h-8 hidden group-hover:block"
                            alt="icon cart hover"/>
                    </a>
                    <span @click="mobileCart = !mobileCart"
                        class="block lg:hidden border-2 transition-all border-transparent hover:border-indigo-500 rounded-full p-2 sm:p-4 ml-2 sm:ml-3 md:ml-5 lg:ml-8 group">
                        <img src="{{ asset('assets/img/icons/icon-cart.svg') }}"
                            class="w-5 sm:w-6 md:w-8 h-5 sm:h-6 md:h-8 block group-hover:hidden"
                            alt="icon cart"/>
                        <img src="{{ asset('assets/img/icons/icon-cart-hover.svg') }}"
                            class="w-5 sm:w-6 md:w-8 h-5 sm:h-6 md:h-8 hidden group-hover:block"
                            alt="icon cart hover"/>
                    </span>
                </div>
            @endauth
            <div class="hidden">
                <i class="bx bx-menu text-indigo-500 text-3xl"
                   @click="mobileMenu = true"></i>
            </div>
        </div>
        <div class="justify-center lg:pt-8 hidden lg:flex">
            <ul class="list-reset flex items-center">
                <li class="mr-10">
                    <a href="/"
                       class="block text-lg font-hk hover:font-bold transition-all text-secondary hover:text-indigo-500 border-b-2 border-white hover:border-indigo-500 px-2">Home</a>
                </li>
                <li class="mr-10">
                    <a href="about.html"
                       class="block text-lg font-hk hover:font-bold transition-all text-secondary hover:text-indigo-500 border-b-2 border-white hover:border-indigo-500 px-2">About</a>
                </li>
                <li class="mr-10 hidden lg:block group">
                    <div class="border-b-2 border-white transition-colors group-hover:border-indigo-500 flex items-center">
                        <span class="cursor-pointer text-lg font-hk group-hover:font-bold text-secondary group-hover:text-indigo-500 px-2 transition-all">Shop</span>
                        <i class="bx bx-chevron-down text-secondary group-hover:text-indigo-500 pl-2 px-2 transition-colors"></i>
                    </div>
                    <div
                         class="pt-10 absolute mt-40 top-0 left-0 right-0 z-50 w-2/3 mx-auto opacity-0 pointer-events-none group-hover:opacity-100 group-hover:pointer-events-auto ">
                        <div class="transition-all flex bg-white shadow-lg p-8 rounded-b relative ">
                            <div class="flex-1 relative z-20">
                                <h4 class="font-hkbold text-base text-secondary mb-2">Man</h4>
                                <ul>
                                    <li>
                                        <a href="collection-grid.html"
                                           class="text-sm font-hk text-secondary-lighter leading-loose border-b border-transparent hover:border-secondary-lighter">Boots</a>
                                    </li>
                                    <li>
                                        <a href="collection-grid.html"
                                           class="text-sm font-hk text-secondary-lighter leading-loose border-b border-transparent hover:border-secondary-lighter">Blutcher Boot</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="flex-1 relative z-20">
                                <h4 class="font-hkbold text-base text-secondary mb-2">Woman</h4>
                                <ul>
                                    <li>
                                        <a href="collection-grid.html"
                                           class="text-sm font-hk text-secondary-lighter leading-loose border-b border-transparent hover:border-secondary-lighter">Accessories</a>
                                    </li>
                                    <li>
                                        <a href="collection-grid.html"
                                           class="text-sm font-hk text-secondary-lighter leading-loose border-b border-transparent hover:border-secondary-lighter">Belts</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="flex-1 relative z-20">
                                <h4 class="font-hkbold text-base text-secondary mb-2">Kids</h4>
                                <ul>
                                    <li>
                                        <a href="collection-grid.html"
                                           class="text-sm font-hk text-secondary-lighter leading-loose border-b border-transparent hover:border-secondary-lighter">Shoes</a>
                                    </li>
                                    <li>
                                        <a href="collection-grid.html"
                                           class="text-sm font-hk text-secondary-lighter leading-loose border-b border-transparent hover:border-secondary-lighter">Derby Shoes</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="flex-1">
                                <div class="z-0 bg-contain bg-right-bottom bg-no-repeat absolute inset-0"
                                     style="background-image: url({{ asset('assets/img/unlicensed/bg-mega-menu.png') }})">
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="mr-10">
                    <a href="contact.html#faq"
                       class="block text-lg font-hk hover:font-bold transition-all text-secondary hover:text-indigo-500 border-b-2 border-white hover:border-indigo-500 px-2">FAQ</a>
                </li>
                <li class="mr-10">
                    <a href="contact.html"
                       class="block text-lg font-hk hover:font-bold transition-all text-secondary hover:text-indigo-500 border-b-2 border-white hover:border-indigo-500 px-2">Contact</a>
                </li>
            </ul>
            @guest
            <ul class="list-reset flex items-center justify-end">
                <li class="mr-10">
                    <a href="{{ route('login') }}"
                       class="block text-lg font-hk hover:font-bold transition-all text-secondary hover:text-indigo-500 border-b-2 border-white hover:border-indigo-500 px-2">Login</a>
                </li>
                <li class="mr-10">
                    <a href="{{ route('register') }}"
                       class="block text-lg font-hk hover:font-bold transition-all text-secondary hover:text-indigo-500 border-b-2 border-white hover:border-indigo-500 px-2">Sign Up</a>
                </li>
            </ul>
            @endguest
        </div>
    </div>
</div>

<div class="fixed inset-x-0 pt-20 md:top-28 z-50 opacity-0 pointer-events-none transition-all "
     :class="{ 'opacity-100 pointer-events-auto': mobileMenu }">
    <div class="w-full sm:w-1/2 absolute left-0 top-0 px-6 z-40 bg-white shadow-sm">
        <a href="{{ route('home') }}"
           class="w-full py-3 cursor-pointer font-hk font-medium text-secondary border-b border-grey-dark block ">Home
        </a>
        <a href="account/wishlist.html"
           class="w-full py-3 cursor-pointer font-hk font-medium text-secondary border-b border-grey-dark block">Wishlist
        </a>
        <div class="w-full py-3 border-b border-grey-dark block"
             x-data="{
                isParentAccordionOpen: false
            }">
            <div class="flex items-center justify-between"
                 @click="isParentAccordionOpen = !isParentAccordionOpen">
                <span class="font-hk font-medium block transition-colors"
                      :class="isParentAccordionOpen ? 'text-indigo-500' : 'text-secondary'">Shop</span>
                <i class="bx text-secondary text-xl"
                   :class="isParentAccordionOpen ? 'bx-chevron-down' : 'bx-chevron-left'"></i>
            </div>
            <div class="transition-all"
                 :class="isParentAccordionOpen ? 'max-h-infinite' : 'max-h-0 overflow-hidden'">
                <div x-data="{
                    isAccordionOpen: false
                }">
                    <div class="flex items-center pt-3"
                         @click="isAccordionOpen = !isAccordionOpen">
                        <i class="bx text-xl pr-3 transition-colors"
                           :class="isAccordionOpen ? 'bx-chevron-down text-secondary' : 'bx-chevron-right text-grey-darkest'"></i>
                        <a href="collection-grid.html"
                           class="font-hk font-medium transition-colors"
                           :class="isAccordionOpen ? 'text-indigo-500' : 'text-grey-darkest'">Men's Fashion</a>
                    </div>
                    <div class="pl-12 transition-all"
                         :class="isAccordionOpen ? 'max-h-infinite' : 'max-h-0 overflow-hidden'">
                        <a href="collection-grid.html"
                           class="font-hk font-medium text-secondary block mt-2">T-Shirts</a>
                        <a href="collection-grid.html"
                           class="font-hk font-medium text-secondary block mt-2">Shirts</a>
                        <a href="collection-grid.html"
                           class="font-hk font-medium text-secondary block mt-2">Men’s Bags</a>
                        <a href="collection-grid.html"
                           class="font-hk font-medium text-secondary block mt-2">Travel Essentials</a>
                    </div>
                </div>
                <div class="flex items-center pt-3">
                    <i class="bx bx-chevron-right text-grey-darkest text-xl pr-3"></i>
                    <a href="collection-grid.html"
                       class="font-hk font-medium text-grey-darkest">Women's Fashion</a>
                </div>
                <div class="flex items-center pt-3">
                    <i class="bx bx-chevron-right text-grey-darkest text-xl pr-3"></i>
                    <a href="collection-grid.html"
                       class="font-hk font-medium text-grey-darkest">Baggage</a>
                </div>
                <div class="flex items-center pt-3">
                    <i class="bx bx-chevron-right text-grey-darkest text-xl pr-3"></i>
                    <a href="collection-grid.html"
                       class="font-hk font-medium text-grey-darkest">Camp</a>
                </div>
                <div class="flex items-center pt-3">
                    <i class="bx bx-chevron-right text-grey-darkest text-xl pr-3"></i>
                    <a href="collection-grid.html"
                       class="font-hk font-medium text-grey-darkest">Personal Care</a>
                </div>
                <div class="flex items-center pt-3">
                    <i class="bx bx-chevron-right text-grey-darkest text-xl pr-3"></i>
                    <a href="collection-grid.html"
                       class="font-hk font-medium text-grey-darkest">Backpacks</a>
                </div>
                <div class="flex items-center pt-3">
                    <i class="bx bx-chevron-right text-grey-darkest text-xl pr-3"></i>
                    <a href="collection-grid.html"
                       class="font-hk font-medium text-grey-darkest">Pullovers</a>
                </div>
            </div>
        </div>
        <a href="about.html"
           class="w-full py-3 cursor-pointer font-hk font-medium text-secondary border-b border-grey-dark block">About
        </a>
        <a href="contact.html#faq"
           class="w-full py-3 cursor-pointer font-hk font-medium text-secondary border-b border-grey-dark block">FAQ
        </a>
        <a href="contact.html"
           class="w-full py-3 cursor-pointer font-hk font-medium text-secondary border-b border-grey-dark block">Contact
        </a>
        @auth
            <a href="{{ route('buyer.profile') }}"
            class="w-full py-3 cursor-pointer font-hk font-medium text-secondary border-b border-grey-dark block">My Account
            </a>
            <a href="contact.html"
                class="w-full py-3 cursor-pointer font-hk font-medium text-secondary border-b border-grey-dark block">My Cart
            </a>
        @endauth

        @guest
        <a href="{{ route('login') }}"
        class="w-full py-3 cursor-pointer font-hk font-medium text-secondary border-b border-grey-dark block">Login
        </a>
        <a href="{{ route('register') }}"
            class="w-full py-3 cursor-pointer font-hk font-medium text-secondary border-b border-grey-dark block">Sign Up
        </a>
        @endguest
    </div>
</div>
