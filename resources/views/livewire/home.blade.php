<section>
    <div class="container" style="padding: 30px 1em;">
        <div class="flex">
            <div class="max-w-[300px] w-full mr-6 1080px:hidden">
                <div class="p-6 mb-3 rounded-[20px] border border-gray-200">
                    <h2 class="text-2xl text-dark border-b mb-3 border-gray-200 pb-4 flex justify-between items-center">Categories <i class="text-[20px] fas fa-list"></i></h2>
                    <p wire:loading wire:target="byCategory" class="py-2 text-green-600">searching...</p>
                    <ul class="flex flex-col">
                        @if ($categories != null)
                            @foreach ($categories as $item)
                                <button wire:click="byCategory({{ $item->id }})" class="cursor-pointer p-3 border border-gray-10 rounded-md mb-3 flex justify-between items-center">{{ $item->name }} <span class="p-1 px-[0.60rem] rounded-full bg-main bg-opacity-30 text-green-800 text-sm">{{ count($item->products) }}</span> </button>
                            @endforeach
                        @endif
                    </ul>
                </div>

                <div class="p-6 rounded-[20px] border border-gray-200">
                    <h2 class="text-2xl text-dark border-b mb-3 border-gray-200 pb-4 flex justify-between items-center">Latest Products <i class="text-[20px] fas fa-box"></i></h2>
                    <ul class="flex flex-col">
                        @if ($latest != null)
                            @foreach ($latest as $item)
                            <div class="px-3 mb-2 py-6 h-fit border border-gray-200 rounded-[20px] hover:shadow-lg transition-all overflow-hidden group">                                  
                                <div class="py-2 relative">
                                    <div class="h-full w-full absolute top-0 left-0 flex items-center justify-center" x-data="{ open: false }">
                                        <i x-on:click="open = ! open" class="fas fa-eye transition-all text-white bg-main rounded-full py-2 px-4 cursor-pointer translate-y-3 hidden group-hover:block group-hover:translate-y-0"></i>
                                        <div x-on:click="open = false" class="fixed top-0 left-0 w-full h-full z-[999] bg-black bg-opacity-90 flex items-center justify-center" x-show="open" x-cloak >
                                            <div class="w-4/12 p-6 rounded-lg bg-white">
                                                <div class="flex mb-3">
                                                    <img src="{{ asset('storage/'. $item->thumb) }}" class="max-w-[250px]">
                                                    <div class="flex flex-col">
                                                        <h2 class="text-4xl">{{ $item->name }}</h2>
                                                        <h3 class="text-3xl text-dark"><span class="text-main">PKR</span> {{ $item->price }}</h3>
                                                    </div>
                                                </div>
                                                <p class="text-dark bg-gray-100 rounded-lg p-2">{{ $item->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <img src="{{ asset('storage/'. $item->thumb) }}" class="w-[130px] h-[130px] hover:scale-110 transition-all m-auto object-fill" alt="{{ $item->name }} Image">
                                </div>
                                <span class="text-gray-500 text-sm">{{ $item->category->name }}</span>
                                <h2 class="text-dark mb-2">{{ $item->name }}</h2>
                                <h3 class="text-dark"><span class="text-main mb-5">PKR</span> {{ number_format($item->price, 2) }}</h3>
                                <button wire:click="addToCart({{ $item->id }})" class="block w-full py-2 font-bold text-center mt-3 bg-main text-white rounded-lg hover:bg-green-800 transition-all"><i class="fas fa-shopping-cart mr-2"></i> Add To Cart</button>
                            </div>
                            @endforeach
                        @endif
                    </ul>
                </div>
                
            </div>
            <div class="w-full">
                <div class="min-h-[300px] py-6 bg-cover bg-center rounded-2xl mb-3 flex justify-between items-center px-6 670px:flex-col" style="background-image: url({{ asset('images/banner.png') }})">
                    <div class="flex flex-col px-8 400px:px-2 670px:order-2">
                        <h1 class="text-4xl text-dark mb-3">Welcome to GiftForPakistan</h1>
                        <p class="text-gray-600 font-medium leading-7 mb-2 670px:hidden">Send Gifts to your friends and family in pakistan. GiftForPakistan provides fast <br> Gifts Delivery all over paskistan. Prices are fixed for our gifts</p>
                        <p class="text-gray-600 font-medium leading-7 mb-2 hidden 670px:block">Send Gifts to your friends and family in pakistan. GiftForPakistan provides fast Gifts Delivery all over paskistan. Prices are fixed for our gifts</p>
                        <span class="py-2 px-4 text-white bg-main rounded-lg w-fit">Free Delivery</span>
                    </div>
                    <img src="{{ asset('storage/product_images/PbW8x0MiW9dVdi7lNLOt4UPXrQBgpLZL4GNsdDd5.png') }}" class="670px:order-1 400px:hidden" alt="product_image">
                </div>
                <div class="box" x-data="{ open: false }">
                    <div class="flex justify-between bg-gray-100 items-center p-4 mb-2 rounded-lg">
                        <h2 class="text-2xl">Popular Products</h2>
                        <div class="flex items-center cursor-pointer" x-on:click="open = ! open">
                            <i class="text-[20px] fas fa-list mr-2"></i>
                            <span>Filter</span>
                        </div>
                    </div>
                    <div x-show="open" class="w-full">
                        <ul class="flex flex-wrap">
                            @if ($categories != null)
                                @foreach ($categories as $item)
                                    <button wire:click="byCategory({{ $item->id }})" class="cursor-pointer p-3 border mr-2 border-gray-10 rounded-md mb-3 flex justify-between items-center">{{ $item->name }} <span class="ml-4 p-1 px-[0.60rem] rounded-full bg-main bg-opacity-30 text-green-800 text-sm">{{ count($item->products) }}</span> </button>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="flex mb-2">
                        <input type="search" name="search" id="search" wire:model.debounce.2000="search" placeholder="Search for items..." 
                        class="bg-gray-100 rounded-lg p-3 text-gray-900 w-full mr-2">
                        <button class="bg-main h-fit py-3 px-4 rounded-lg"><i class="fas fa-search"></i></button>
                    </div>
                    <p wire:loading wire:target="updated" class="py-2 text-green-600">Seaching product...</p>
                    @if (session('success'))
                        <p class="p-4 rounded-lg text-white bg-main fixed bottom-2 left-2 shadow-lg">{{ session('success') }}</p>
                    @endif
                    <div class="grid grid-cols-5 1235px:grid-cols-4 850px:grid-cols-3 620px:grid-cols-2 gap-4 400px:grid-cols-1 400px:max-w-[370px] m-auto">
                        @if ($products != null)
                            @foreach ($products as $item)
                                <div class="px-3 py-6 h-fit border border-gray-200 rounded-[20px] hover:shadow-lg transition-all overflow-hidden group">                                  
                                    <div class="py-2 relative">
                                        <div class="h-full w-full absolute top-0 left-0 flex items-center justify-center" x-data="{ open: false }">
                                            <i x-on:click="open = ! open" class="fas fa-eye transition-all text-white bg-main rounded-full py-2 px-4 cursor-pointer translate-y-3 hidden group-hover:block group-hover:translate-y-0"></i>
                                            <div x-on:click="open = false" class="fixed top-0 left-0 w-full h-full z-[999] bg-black bg-opacity-90 flex items-center justify-center" x-show="open" x-cloak >
                                                <div class="w-4/12 p-6 rounded-lg bg-white">
                                                    <div class="flex mb-3">
                                                        <img src="{{ asset('storage/'. $item->thumb) }}" class="max-w-[250px]">
                                                        <div class="flex flex-col">
                                                            <h2 class="text-4xl">{{ $item->name }}</h2>
                                                            <h3 class="text-3xl text-dark"><span class="text-main">PKR</span> {{ $item->price }}</h3>
                                                        </div>
                                                    </div>
                                                    <p class="text-dark bg-gray-100 rounded-lg p-2">{{ $item->description }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="{{ asset('storage/'. $item->thumb) }}" class="w-[130px] h-[130px] hover:scale-110 transition-all m-auto object-fill" alt="{{ $item->name }} Image">
                                    </div>
                                    <span class="text-gray-500 text-sm">{{ $item->category->name }}</span>
                                    <h2 class="text-dark mb-2">{{ $item->name }}</h2>
                                    <h3 class="text-dark"><span class="text-main mb-5">PKR</span> {{ number_format($item->price, 2) }}</h3>
                                    <button wire:click="addToCart({{ $item->id }})" class="block w-full py-2 font-bold text-center mt-3 bg-main text-white rounded-lg hover:bg-green-800 transition-all"><i class="fas fa-shopping-cart mr-2"></i> Add To Cart</button>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>