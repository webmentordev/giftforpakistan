@extends('layouts.apps')
@section('content')
    <section class="py-[50px]">
        <div class="container m-auto flex px-4" style="max-width: 750px;">
            <div class="w-full flex flex-col items-center">
                <div class="box w-full py-6 px-8 bg-gray-100 shadow-md rounded-lg">
                    <h1 class="text-5xl mb-3 font-bold text-dark">Verify your Email</h1>
                    @if (session('success'))
                        <p class="text-green-500 font-bold text-2xl mb-2">{{ session('success') }}</p>
                    @endif
                    @if (session('error'))
                        <p class="text-red-500 font-bold text-2xl mb-2">{{ session('error') }}</p>
                    @endif
                    <p class="leading-8 mb-2">We have sent verification email at <span class="text-main">{{ auth()->user()->email }}</span>. It will expire in 10 minutes. Verification is necessary we can verify the authenticity of a user.</p>
                    <form action="{{ route('verification.send') }}" method="POST">
                        @csrf
                        <button type="submit" class="rounded-lg py-4 bg-dark px-7 text-white font-bold hover:bg-main transition-all">Re-Send Verification Email</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection