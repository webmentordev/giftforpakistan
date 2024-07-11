<section class="">
    <div class="container" style="padding: 30px 1em">
        @if (session('success'))
            <p class="text-green-900 p-3 text-lg text-center font-bold mb-2 bg-green-600 bg-opacity-20">{{ session('success') }}</p>
        @endif
        <h1 class="text-4xl text-dark">Your Cart</h1>
        <div class="flex items-center justify-between mb-3 450px:flex-col">
            <p class="text-lg text-dark 450px:mb-3">There {{ Str::plural('is', $cart) }} <span class="text-main font-bold">{{ count($cart) }}</span> {{ Str::plural('product', $cart) }} in your cart</p>
            <button wire:click="emptyCart" class="bg-red-500 text-white py-2 px-6 rounded-lg"><i class="fas fa-trash mr-2"></i> Empty Cart</button>
        </div>
        <div class="w-full flex 1080px:flex-col">
            <div class="w-full mr-6">
                @if (count($cart) && $cart != null)
                        <div class=" 670px:flex flex-col text-start">
                            @foreach ($cart as $item)
                            <div class="p-3 bg-gray-100 mb-3 rounded-lg flex justify-between items-center 630px:flex-col">
                                <div class="flex items-center 630px:mb-3">
                                    <img class="w-[70px] mr-3" src="{{ asset('storage/'.$item->product->thumb) }}">
                                    <div class="flex flex-col">
                                        <h3 class="text-gray-900">{{ $item->product->name }} <span class="text-main">x{{ $item->quantity }}</span></h3>
                                        <h4><strong>Price:</strong> <span class="text-main">{{ number_format($item->product->price * $item->quantity, 2) }}</span></h4>
                                    </div>
                                </div>
                                <form action="{{ route('cart.update', $item->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="flex justify-end">
                                        <input type="number" class="border-main border rounded-md mr-2 p-2 focus:border-main focus:ring-4 focus:ring-main-light" value="{{ $item->quantity }}" name="quantity" id="quantity" onchange="this.form.submit()">
                                        <button type="submit" class="py-2 px-3 bg-main text-white rounded-md">Update</button>
                                    </div>
                                </form>
                            </div>
                        @endforeach
                        </div>
                    @else
                        <div class="p-6 bg-gray-100 mb-3 rounded-lg">
                            <p class="text-gray-700 font-bold">Cart is empty!</p>
                        </div>
                    @endif
                <h3 class="text-2xl text-end">Total Price: <span class="text-main font-bold mr-1">PKR</span>{{ number_format($total_price, 2) }}</h3>
            </div>
            <div class="max-w-[400px] w-full">
                <div class="w-full mr-6">
                    <div class="p-6 rounded-[20px] border border-gray-200" style="box-shadow: 5px 5px 15px rgb(0 0 0 / 5%)">
                        <h2 class="text-2xl text-dark border-b mb-3 border-gray-200 pb-4 flex justify-between items-center">Checkout</h2>
                        <form action="{{ route('checkout') }}" method="POST">
                            @csrf
                            <p class="text-orange-800 mb-2 font-bold bg-yellow-500 bg-opacity-20 border border-yellow-600 p-3 rounded-lg">Cash-On-Delivery is only available for now.</p>
                            @if (session('failed'))
                                <p class="text-red-900 p-3 text-center font-bold mb-2 bg-red-600 bg-opacity-20">{{ session('failed') }}</p>
                            @endif
                            <input type="text" name="name" placeholder="Receiver Name"
                            class="w-full border border-gray-200 mb-3 p-3 py-2 rounded-xl">
                            @error('name')
                                <p class="text-red-600 mb-2">{{ $message }}</p>
                            @enderror
                            <input type="number" name="phone" placeholder="Receiver Phone Number (923003)"
                            class="w-full border border-gray-200 mb-3 p-3 py-2 rounded-xl">
                            @error('phone')
                                <p class="text-red-600 mb-2">{{ $message }}</p>
                            @enderror
                            <textarea name="address" placeholder="Receiver Address" id="address" cols="30" rows="4" class="w-full border border-gray-200 mb-3 p-3 py-2 rounded-xl"></textarea>
                            @error('address')
                                <p class="text-red-600 mb-2">{{ $message }}</p>
                            @enderror
                            <div class="flex mb-2">
                                <input type="radio" id="service" name="service" checked class="mr-2">
                                <label for="service">Cash-on-delivery</label>
                            </div>
                            <button class="p-2 px-4 rounded-lg bg-blue-600 text-white font-bold">Complete Checkout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>