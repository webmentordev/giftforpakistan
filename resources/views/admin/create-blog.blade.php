@extends('layouts.apps')
@section('content')
<section class="py-[50px]">
    <div class="container m-auto" style="max-width: 660px;">
        <div class="w-full flex flex-col items-center">
            <div class="box w-full py-6">
                <h1 class="text-5xl mb-3 font-bold text-dark">Create New Blog</h1>
                @if (session('success'))
                    <p class="text-green-500 font-bold text-2xl mb-2">{{ session('success') }}</p>
                @endif
                <form action="{{ route('blog.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="title" placeholder="Blog Title" autocomplete="off" required
                    class="w-full border border-gray-200 mb-3 p-3 py-4 rounded-xl">
                    @error('title')
                        <p class="text-red-600 mb-2 ml-2">{{ $message }}</p>
                    @enderror
                    <label for="tags">Tags: (Please do not put spaces between tags or use single word)</label>
                    <input type="text" id="tags" name="tags" placeholder="Blog Tags (Saperate by |)" autocomplete="off" required
                    class="w-full border border-gray-200 mb-3 p-3 py-4 rounded-xl">
                    @error('tags')
                        <p class="text-red-600 mb-2 ml-2">{{ $message }}</p>
                    @enderror
            
                    <input type="text" id="description" name="description" placeholder="Blog Description" autocomplete="off" required
                     class="w-full border border-gray-200 mb-3 p-3 py-4 rounded-xl">
                    @error('description')
                        <p class="text-red-600 mb-2 ml-2">{{ $message }}</p>
                    @enderror
            
                    <label class="text-gray-700" for="large_thumb">Thumbnail (300KB Max)</label>
                    <input type="file" id="thumb" name="thumb" autocomplete="off" accept="image/*" required
                     class="w-full border border-gray-200 mb-3 p-3 py-4 rounded-xl">
                    @error('thumb')
                        <p class="text-red-600 mb-2 ml-2">{{ $message }}</p>
                    @enderror
                    <textarea class="form-control mb-3" id="summary_ckeditor" name="summary_ckeditor" required></textarea>
                    @error('summary_ckeditor')
                        <p class="text-red-600 mb-2 ml-2">{{ $message }}</p>
                    @enderror
                    <button type="submit" class="rounded-lg mt-6 py-4 bg-dark px-7 mb-2 text-white font-bold hover:bg-main transition-all">Post Blog</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection