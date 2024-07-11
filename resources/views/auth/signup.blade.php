@extends('layouts.apps')
@section('content')
    <section class="py-[50px]">
        <div class="container m-auto flex px-4" style="max-width: 960px;">
            <img src="{{ asset('images/auth-image.png') }}" class="w-[400px] h-fit mr-5 rounded-lg 740px:hidden" alt="Authentication Image">
            <div class="w-full flex flex-col items-center">
                <div class="box w-full py-6">
                    <h1 class="text-5xl mb-3 font-bold text-dark">Create an account</h1>
                    <p class="mb-5">Already have an account? <a href="{{ route('login') }}" class="text-main underline">Login</a></p>
                    @if (session('failed'))
                        <p class="text-red-500 font-bold text-2xl mb-2">{{ session('failed') }}</p>
                    @endif
                    <form action="{{ route('signup') }}" method="POST">
                        @csrf
                        <input type="text" name="name" placeholder="Your Full Name" autocomplete="off" required
                        class="w-full border border-gray-200 mb-3 p-3 py-4 rounded-xl">
                        @error('name')
                            <p class="text-red-500 ml-3 mb-2">{{ $message }}*</p>
                        @enderror
                        <input type="email" name="email" placeholder="Your Email" autocomplete="off" required
                        class="w-full border border-gray-200 mb-3 p-3 py-4 rounded-xl">
                        @error('email')
                            <p class="text-red-500 ml-3 mb-2">{{ $message }}*</p>
                        @enderror
                        <input type="password" name="password" placeholder="Your Password" autocomplete="off" required
                        class="w-full border border-gray-200 mb-3 p-3 py-4 rounded-xl">
                        @error('password')
                            <p class="text-red-500 ml-3 mb-2">{{ $message }}*</p>
                        @enderror
                        <input type="password" name="password_confirmation" placeholder="Confirm Password" autocomplete="off" required
                        class="w-full border border-gray-200 mb-3 p-3 py-4 rounded-xl">
                        @error('password_confirmation')
                            <p class="text-red-500 ml-3 mb-2">{{ $message }}*</p>
                        @enderror
                        <button type="submit" class="rounded-lg mb-3 py-4 bg-dark px-7 text-white font-bold hover:bg-main transition-all">Signup</button>
                        <p class="text-dark text-sm"><strong>Note:</strong> Your email and data is only used to keep track of your orders. We don't use it for cookies, personal or other uses.</p>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection