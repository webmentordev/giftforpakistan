@extends('layouts.apps')
@section('content')
    <section class="py-[50px]">
        <div class="container m-auto flex px-4" style="max-width: 750px;">
            <div class="w-full flex flex-col items-center">
                <div class="box w-full py-6 px-8 bg-gray-100 shadow-md rounded-lg">
                    <h1 class="text-5xl mb-3 font-bold text-dark">Reset Password!</h1>
                    @if (session('success'))
                        <p class="text-green-500 font-bold text-2xl mb-2">{{ session('success') }}</p>
                    @endif
                    @if (session('error'))
                        <p class="text-red-500 font-bold text-2xl mb-2">{{ session('error') }}</p>
                    @endif
                    <p class="leading-8 mb-2">Now you can choose your new password, Must write your email address.</p>
                    <form action="{{ route('password.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="token" placeholder="token" autocomplete="off" required
                        class="w-full border border-gray-200 mb-3 p-3 py-4 rounded-xl" value="{{ $token }}">
                        <input type="email" name="email" placeholder="Your Email" autocomplete="off" required
                        class="w-full border border-gray-200 mb-3 p-3 py-4 rounded-xl">
                        @error('email')
                            <p class="text-red-500 ml-3 mb-2">{{ $message }}*</p>
                        @enderror
                        <input type="password" name="password" placeholder="New Password" autocomplete="off" required
                        class="w-full border border-gray-200 mb-3 p-3 py-4 rounded-xl">
                        @error('password')
                            <p class="text-red-500 ml-3 mb-2">{{ $message }}*</p>
                        @enderror
                        <input type="password" name="password_confirmation" placeholder="Confirm New Password" autocomplete="off" required
                        class="w-full border border-gray-200 mb-3 p-3 py-4 rounded-xl">
                        @error('password_confirmation')
                            <p class="text-red-500 ml-3 mb-2">{{ $message }}*</p>
                        @enderror
                        <button type="submit" class="rounded-lg py-4 bg-dark px-7 text-white font-bold hover:bg-main transition-all">Reset Now</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection