@extends('layouts.profile')
@section('content')
    <div class="box w-full px-4">
        <h1 class="text-3xl mb-3 font-bold text-dark">Account Details</h1>
        <p class="border-l-4 border-red-800 p-3 bg-red-500 bg-opacity-10 text-red-900 mb-3">We do not allow resetting your password directly from your account settings because it can cause Security issue. If someone knows your password they can directly change it from account setting. To make it secure, we need email confirmation to reset password. Logout then follow the reset procedure.</p>
        <form action="{{ route('setting.update') }}" method="POST">
            @csrf
            @if (session('success'))
                <p class="text-green-600 py-2 ml-3 font-bold">{{ session('success') }}</p>
            @endif
            @method('PUT')
            <label for="name" class="font-bold">Fullname:</label>
            <input type="name" name="name" placeholder="Your Name" autocomplete="off" value="{{ auth()->user()->name }}"
            class="w-full border border-gray-200 mb-3 p-3 py-4 rounded-xl">
            @error('name')
                <p class="text-red-500 ml-3 mb-2">{{ $message }}*</p>
            @enderror
            <label for="address" class="font-bold">Delivery Address:</label>
            <textarea name="address" id="address" cols="30" rows="6" placeholder="Your Address"
            class="w-full border border-gray-200 mb-3 p-3 py-4 rounded-xl">{{ auth()->user()->address }}</textarea>
            @error('address')
                <p class="text-red-500 ml-3 mb-2">{{ $message }}*</p>
            @enderror
            <p class="mb-2 text-gray-600">* if you want to keep it same, just don't change it or don't submit</p>
            <button class="bg-main rounded-lg py-3 px-4 text-white font-bold">Update Settings</button>
        </form>
    </div>
@endsection