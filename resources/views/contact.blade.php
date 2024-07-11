@extends('layouts.apps')
@section('content')
    <section class="py-[50px]">
        <div class="container m-auto flex px-4" style="max-width: 750px;">
            <div class="w-full flex flex-col items-center">
                <div class="box w-full py-6 px-8 bg-gray-100 shadow-md rounded-lg">
                    <h1 class="text-5xl mb-3 font-bold text-dark">Contact Us Here</h1>
                    @if (session('success'))
                        <p class="text-green-500 font-bold text-2xl mb-2">{{ session('success') }}</p>
                    @endif
                    <p class="text-gray-600 mb-2">Your email address will not be published and We will contact you using our official email address <span class="text-main">contact@giftforpakistan.com</span>. Thank You</p>
                    <form action="{{ route('contact') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-2 gap-6">
                            <div class="input">
                                <input type="text" name="name" placeholder="Your Full Name" autocomplete="off" required
                                class="w-full border border-gray-200 mb-3 p-3 py-4 rounded-xl">
                                @error('name')
                                    <p class="text-red-500 ml-3 mb-2">{{ $message }}*</p>
                                @enderror
                            </div>
                            <div class="input">
                                <input type="email" name="email" placeholder="Your Email" autocomplete="off" required
                                class="w-full border border-gray-200 mb-3 p-3 py-4 rounded-xl">
                                @error('email')
                                    <p class="text-red-500 ml-3 mb-2">{{ $message }}*</p>
                                @enderror
                            </div>
                        </div>
                        <input type="text" name="subject" placeholder="Your Subject" autocomplete="off" required
                        class="w-full border border-gray-200 mb-3 p-3 py-4 rounded-xl">
                        @error('subject')
                            <p class="text-red-500 ml-3 mb-2">{{ $message }}*</p>
                        @enderror
                        <textarea name="message" id="message" cols="30" rows="6" placeholder="Your Message"
                        class="w-full border border-gray-200 mb-3 p-3 py-4 rounded-xl"></textarea>
                        @error('message')
                            <p class="text-red-500 ml-3 mb-2">{{ $message }}*</p>
                        @enderror
                        <button type="submit" class="rounded-lg py-4 bg-dark px-7 text-white font-bold hover:bg-main transition-all">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection