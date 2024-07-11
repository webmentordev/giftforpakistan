@extends('layouts.apps')
@section('content')
    <section class="py-[50px]">
        <div class="container m-auto" style="max-width: 660px;">
            <div class="w-full flex flex-col items-center">
                <div class="box w-full py-6">
                    <h1 class="text-5xl mb-3 font-bold text-dark">Update Product</h1>
                    <p class="mb-5">If you don't want to update, just leave it blank.</p>
                    @if (session('success'))
                        <p class="text-green-500 font-bold text-2xl mb-2">{{ session('success') }}</p>
                    @endif
                    <form action="{{ route('update.product', $id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <label for="name" class="font-bold">Product Name:</label>
                        <input type="text" name="name" placeholder="Product Name" autocomplete="off"  value="{{ old('name') }}"
                        class="w-full border border-gray-200 mb-3 p-3 py-4 rounded-xl">
                        @error('name')
                            <p class="text-red-500 ml-3 mb-2">{{ $message }}*</p>
                        @enderror
                        <label for="category" class="font-bold">Product Category:</label>
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
                        <select name="status" id="status" class="w-full border border-gray-200 mb-3 p-3 py-4 rounded-xl">
                            <option value="" selected>---Select Status---</option>
                            <option value="true">Activate</option>
                            <option value="false">Deactivate</option>
                        </select>
                        @error('status')
                            <p class="text-red-500 ml-3 mb-2">{{ $message }}*</p>
                        @enderror
                        <label for="price" class="font-bold">Product Price:</label>
                        <input type="number" name="price" placeholder="Product Price" autocomplete="off"  value="{{ old('price') }}"
                        class="w-full border border-gray-200 mb-3 p-3 py-4 rounded-xl">
                        @error('price')
                            <p class="text-red-500 ml-3 mb-2">{{ $message }}*</p>
                        @enderror
                        <label for="options" class="font-bold">Product Options (caperate By |):</label>
                        <input type="text" name="options" placeholder="Product Options (caperate By |)" autocomplete="off"  value="{{ old('options') }}"
                        class="w-full border border-gray-200 mb-3 p-3 py-4 rounded-xl">
                        @error('options')
                            <p class="text-red-500 ml-3 mb-2">{{ $message }}*</p>
                        @enderror
                        <label for="description" class="font-bold">Product Description:</label>
                        <textarea name="description" id="description" cols="30" rows="6"
                        class="w-full border border-gray-200 mb-3 p-3 py-4 rounded-xl" placeholder="Product Description">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-red-500 ml-3 mb-2">{{ $message }}*</p>
                        @enderror
                        <label for="thumb" class="font-bold">Product Image:</label>
                        <input type="file" id="thumb" name="thumb" autocomplete="off"  accept="image/*"
                        class="w-full border border-gray-200 mb-3 p-3 py-4 rounded-xl">
                        @error('thumb')
                            <p class="text-red-500 ml-3 mb-2">{{ $message }}*</p>
                        @enderror
                        <button type="submit" class="rounded-lg py-4 bg-dark px-7 mb-2 text-white font-bold hover:bg-main transition-all">Update Product</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection