<section>
    <nav class="border-b border-gray-100">
        <div class="container p-2 px-4 flex items-center justify-between 620px:flex-col">
            <ul class="560px:mb-3">
                <a href="{{ route('about') }}" class="text-gray-600 text-sm pr-4">About Us</a>
                <a href="{{ route('track.order') }}" class="text-gray-600 text-sm px-4 border-x border-gray-200">Order Tracking</a>
                <a href="{{ route('profile') }}" class="text-gray-600 text-sm px-4">My Account</a>
                @auth
                    @if (auth()->user()->is_admin == true)
                        <a href="{{ route('dashboard') }}" class="text-gray-600 text-sm px-4 border-l border-gray-200">Dashboard</a>
                    @endif
                @endauth
            </ul>
            <h3 class="text-dark"><i class="fas fa-phone text-main"></i> +923182360966</h3>
        </div>
    </nav>
    <nav class="sticky top-0 left-0 z-10 bg-white" id="navbar">
        <div class="container p-3 px-4 flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center"><img src="{{ asset('images/gift-logo.png') }}" class="mr-2 w-[60px]" alt="Favicon"> <h2 class="text-2xl text-main" style="margin: 0px">GiftForPakistan</h2></a>
            <ul class="flex 1080px:hidden">
                <a href="{{ route('home') }}" class="text-dark font-bold mx-2 px-2 hover:text-main">Home</a>
                <a href="{{ route('about') }}" class="text-dark font-bold mx-2 px-2 hover:text-main">About</a>
                <a href="{{ route('blogs') }}" class="text-dark font-bold mx-2 px-2 hover:text-main">Blogs</a>
                <a href="{{ route('contact') }}" class="text-dark font-bold mx-2 px-2 hover:text-main">Contact</a>
                <a href="{{ route('cart') }}" class="text-dark font-bold mx-2 px-2 hover:text-main"><i class="fas fa-shopping-cart"></i></a>
                @auth
                    <div class="relative group text-dark"><span class="font-bold"><i class="fas fa-user mr-2"></i> My Account</span>
                        <div class="absolute hidden group-hover:block top-6 -left-[80%]">
                            <ul class="p-4 w-[200px] bg-white rounded-md flex flex-col shadow-lg border border-gray-100">
                                @if (auth()->user()->is_admin == true)
                                    <a href="{{ route('dashboard') }}" class="mb-4 hover:ml-2 text-dark hover:text-main transition-all"><i class="fas fa-cogs mr-2"></i> Dashboard</a>
                                @endif
                                <a href="{{ route('profile') }}" class="mb-4 hover:ml-2 text-dark hover:text-main transition-all"><i class="fas fa-user mr-2"></i> Profile</a>
                                <a href="{{ route('track.order') }}" class="mb-4 hover:ml-2 text-dark hover:text-main transition-all"><i class="fas fa-tag mr-2"></i> Order Tracking</a>
                                <a href="{{ route('setting') }}" class="mb-4 hover:ml-2 text-dark hover:text-main transition-all"><i class="fas fa-sliders mr-2"></i> Settings</a>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="bg-gray-900 text-white w-full rounded-md py-2 text-sm" type="submit"><i class="fas fa-arrow-right-from-bracket"></i> Logout</button>
                                </form>
                            </ul>
                        </div>
                    </div>
                @endauth
                @guest
                    <a href="{{ route('login') }}" class="text-dark font-bold px-4 hover:text-main border-r border-gray-200">Login</a>  
                    <a href="{{ route('signup') }}" class="text-dark font-bold mx-2 px-2 hover:text-main">Signup</a>  
                @endguest
            </ul>
            <div class="hidden 1080px:block" x-data="{ open: false }">
                <ul x-on:click="open = ! open">
                    <li class="h-[2px] my-1 w-[40px] bg-black"></li> 
                    <li class="h-[2px] my-1 w-[40px] bg-black"></li> 
                    <li class="h-[2px] my-1 w-[40px] bg-black"></li> 
                </ul>
                <div x-show="open" x-transition x-cloak class="fixed z-50 top-0 left-0 w-full h-full bg-white bg-opacity-60 backdrop-blur-md">
                    <div class="realative flex justify-center items-center h-full w-full">
                        <span x-on:click="open = false" class="absolute top-2 left-2"><i class="fas fa-times bg-gray-900 text-white p-3 px-4 rounded-full"></i></span>
                        <div class="flex flex-col">
                            <ul class="flex flex-col text-center">
                                <a href="{{ route('home') }}" class="text-dark mb-3 font-bold mx-2 px-2 hover:text-main">Home</a>
                                <a href="{{ route('about') }}" class="text-dark mb-3 font-bold mx-2 px-2 hover:text-main">About</a>
                                <a href="{{ route('blogs') }}" class="text-dark mb-3 font-bold mx-2 px-2 hover:text-main">Blogs</a>
                                <a href="{{ route('contact') }}" class="text-dark mb-3 font-bold mx-2 px-2 hover:text-main">Contact</a>
                                @auth
                                    @if (auth()->user()->is_admin == true)
                                        <a href="{{ route('dashboard') }}" class="text-dark mb-3 font-bold mx-2 px-2 hover:text-main">Dashboard</a>
                                    @endif
                                    <a href="{{ route('profile') }}" class="text-dark mb-3 font-bold mx-2 px-2 hover:text-main">Profile</a>
                                    <a href="{{ route('track.order') }}" class="text-dark mb-3 font-bold mx-2 px-2 hover:text-main">Order Tracking</a>
                                    <a href="{{ route('setting') }}" class="text-dark mb-3 font-bold mx-2 px-2 hover:text-main">Settings</a>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button class="bg-gray-900 text-white w-full rounded-md py-2 text-sm" type="submit"><i class="fas fa-arrow-right-from-bracket"></i> Logout</button>
                                    </form>
                                @endauth
                                @guest
                                    <a href="{{ route('login') }}" class="text-dark mb-3 font-bold px-4 hover:text-main border-r border-gray-200">Login</a>  
                                    <a href="{{ route('signup') }}" class="text-dark mb-3 font-bold mx-2 px-2 hover:text-main">Signup</a>  
                                @endguest
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</section>