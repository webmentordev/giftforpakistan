@extends('layouts.apps')
@section('content')
    <section class="py-[50px]">
        <div class="container m-auto flex px-4" style="max-width: 750px;">
            <div class="w-full flex flex-col items-center">
                <div class="box w-full py-6 px-8 bg-gray-100 shadow-md rounded-lg">
                    <h1 class="text-5xl mb-3 font-bold text-dark">Forgot Password?</h1>
                    @if (session('success'))
                        <p class="text-green-500 font-bold text-2xl mb-2">{{ session('success') }}</p>
                    @endif
                    @if (session('error'))
                        <p class="text-red-500 font-bold text-2xl mb-2">{{ session('error') }}</p>
                    @endif
                    <p class="leading-8 mb-2">Write your email address here. We will send you a passsword reset link which will expire in 10 minutes if you don't click it on time.</p>
                    <form action="{{ route('password.email') }}" method="POST">
                        @csrf
                        <input type="email" name="email" placeholder="Your Email" autocomplete="off" required
                        class="w-full border border-gray-200 mb-3 p-3 py-4 rounded-xl">
                        @error('email')
                            <p class="text-red-500 ml-3 mb-2">{{ $message }}*</p>
                        @enderror
                        <button type="submit" class="rounded-lg py-4 bg-dark px-7 text-white font-bold hover:bg-main transition-all">Send Request</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection