@extends('layouts.apps')
@section('content')
    <section class="py-[50px]">
        <div class="container m-auto" style="max-width: 660px;">
            <div class="w-full flex flex-col items-center px-4">
                <div class="box w-full py-6 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <h1 class="text-5xl mb-3 font-bold text-dark">Order Tracking</h1>
                        <img src="{{ asset('images/gift.png') }}" class="w-[80px]" alt="Shipping Icon">
                    </div>
                    <p class="mb-5">Email and Order Number must be same to able to track your order</p>
                    @if (session('success'))
                        <p class="text-green-500 font-bold text-2xl mb-2">{{ session('success') }}</p>
                    @endif
                    <form action="{{ route('track.order') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="email" name="email" placeholder="Email" required
                        class="w-full border border-gray-200 mb-3 p-3 py-4 rounded-xl">
                        @error('email')
                            <p class="text-red-500 ml-3 mb-2">{{ $message }}*</p>
                        @enderror
                        <input type="number" name="order" placeholder="Order ID" required
                        class="w-full border border-gray-200 mb-3 p-3 py-4 rounded-xl">
                        @error('order')
                            <p class="text-red-500 ml-3 mb-2">{{ $message }}*</p>
                        @enderror
                        <button type="submit" class="rounded-lg py-4 bg-dark px-7 mb-2 text-white font-bold hover:bg-main transition-all">Track</button>
                    </form>
                </div>
                @if ($status != null && count($status))
                    <div class="py-4 w-full mt-6 relative">
                        <div class="flex justify-between">
                            <img src="{{ asset('images/box.png') }}" class="text-start w-[40px] h-[35px]" alt="Processing Icon">
                            <img src="{{ asset('images/fast-delivery.png') }}" class="m-auto w-[50px]" alt="Shipping Icon">
                            <img src="{{ asset('images/check.png') }}" class="float-right w-[48px] h-[45px]" alt="Shipment Completed Icon">
                        </div>
                        <div class="w-full h-[15px] bg-gray-200 rounded-lg overflow-hidden">
                            <div class="h-[15px] rounded-lg" style="@if(count($status) == 1) width: 0%; @elseif(count($status) == 2) width: 50%; @elseif(count($status) == 3) width: 100%; @else width: 0%; @endif background: rgb(108,255,0); background: linear-gradient(90deg, rgba(108,255,0,0.38699229691876746) 0%, rgba(0,166,41,1) 100%);"></div>
                        </div>
                        <div class="flex justify-between font-bold">
                            <span>Processing</span>
                            <span>Shipping</span>
                            <span>Delivered</span>
                        </div>
                        <div class="py-2">
                            @foreach ($status as $item)
                                <p class="text-md p-3 rounded-lg bg-gray-100 mb-2"><strong>{{ $item->created_at->format('M d, Y h:i:s A') }}</strong> | {{ $item->line }}</p>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection