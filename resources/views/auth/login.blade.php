@extends('layouts.apps')
@section('content')
    <section class="py-[50px] px-4">
        <div class="container m-auto flex" style="max-width: 960px;">
            <img src="{{ asset('images/auth-image.png') }}" class="w-[400px] h-fit mr-5 rounded-lg 760px:hidden" alt="Authentication Image">
            <div class="w-full flex flex-col items-center">
                <div class="box w-full py-6">
                    <h1 class="text-5xl mb-3 font-bold text-dark">Login Your Account</h1>
                    <p class="mb-5">Don't have an account? <a href="{{ route('signup') }}" class="text-main underline">Create here</a></p>
                    @if (session('success'))
                        <p class="text-green-500 font-bold text-2xl mb-2">{{ session('success') }}</p>
                    @endif
                    @if (session('failed'))
                        <p class="text-red-500 font-bold text-2xl mb-2">{{ session('failed') }}</p>
                    @endif
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
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
                        <div class="flex mb-4 ml-3">
                            <input type="checkbox" name="remember" id="remember" class="mr-2">
                            <label for="remember" class="text-dark">Remember me</label>
                        </div>
                        <button type="submit" class="rounded-lg py-4 bg-dark px-7 mb-2 text-white font-bold hover:bg-main transition-all">Login</button>
                        <p>Have you forgot your password? <a class="text-main underline" href="{{ route('password.request') }}">Reset here</a></p>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection