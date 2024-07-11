@extends('layouts.apps')
@section('content')
    <section class="py-[50px]">
        <div class="container m-auto" style="max-width: 660px;">
            <div class="w-full flex flex-col items-center">
                <div class="box w-full py-6">
                    <h1 class="text-5xl mb-3 font-bold text-dark">Create New Product</h1>
                    <p class="mb-5">Remember, once you have created a product, it is not deleteable but you can update it and deactivate it.</p>
                    @if (session('success'))
                        <p class="text-green-500 font-bold text-2xl mb-2">{{ session('success') }}</p>
                    @endif
                    <form action="{{ route('create.product') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="name" placeholder="Product Name" autocomplete="off" required value="{{ old('name') }}"
                        class="w-full border border-gray-200 mb-3 p-3 py-4 rounded-xl">
                        @error('name')
                            <p class="text-red-500 ml-3 mb-2">{{ $message }}*</p>
                        @enderror
                        <select name="category" id="category" class="w-full border border-gray-200 mb-3 p-3 py-4 rounded-xl">
                            @if (count($categories) && $categories != null)
                                <option value="" selected>---Select Category---</option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            @else
                                <option value="" selected>---No Category Exist---</option>
                            @endif
                        </select>
                        @error('category')
                            <p class="text-red-500 ml-3 mb-2">{{ $message }}*</p>
                        @enderror
                        <input type="number" name="price" placeholder="Product Price" autocomplete="off" required value="{{ old('price') }}"
                        class="w-full border border-gray-200 mb-3 p-3 py-4 rounded-xl">
                        @error('price')
                            <p class="text-red-500 ml-3 mb-2">{{ $message }}*</p>
                        @enderror
                        <input type="text" name="options" placeholder="Product Options (caperate By |)" autocomplete="off" required value="{{ old('options') }}"
                        class="w-full border border-gray-200 mb-3 p-3 py-4 rounded-xl">
                        @error('options')
                            <p class="text-red-500 ml-3 mb-2">{{ $message }}*</p>
                        @enderror
                        <textarea name="description" id="description" cols="30" rows="6"
                        class="w-full border border-gray-200 mb-3 p-3 py-4 rounded-xl" placeholder="Product Description">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-red-500 ml-3 mb-2">{{ $message }}*</p>
                        @enderror
                        <label for="thumb">Product Image:</label>
                        <input type="file" id="thumb" name="thumb" autocomplete="off" required accept="image/*"
                        class="w-full border border-gray-200 mb-3 p-3 py-4 rounded-xl">
                        @error('thumb')
                            <p class="text-red-500 ml-3 mb-2">{{ $message }}*</p>
                        @enderror
                        <button type="submit" class="rounded-lg py-4 bg-dark px-7 mb-2 text-white font-bold hover:bg-main transition-all">Post Product</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection