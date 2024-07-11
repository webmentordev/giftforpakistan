@extends('layouts.apps')
@section('content')
<section class="py-[50px]">
    <div class="container" style="padding: 10px 1em">
        @if (count($blogs) && $blogs != null)
            <div class="grid grid-cols-4 gap-8 1340px:grid-cols-3 1080px:grid-cols-2 1080px:max-w-3xl m-auto 740px:grid-cols-1 740px:max-w-md">
                @foreach ($blogs as $item)
                    <a href="{{ route('blog.read', $item->slug) }}" class="box text-center">
                        <div class="rounded-lg img h-[260px] mb-3 w-full bg-cover bg-center" style="background-image: url({{ asset('storage/'. $item->thumb) }})"></div>
                        <h2 class="text-2xl">{{ $item->title }}</h2>
                        <ul class="flex text-sm w-full justify-center">
                            <li>{{ $item->created_at->format('M d, Y') }}</li>
                            <li class="px-2">-</li>
                            <li>By {{ $item->user->name }}</li>
                        </ul>
                    </a>
                @endforeach
            </div>
        @else
            <div class="text-center">
                <img src="{{ asset('images/gift-logo.png') }}" alt="GiftForPakistan Logo" class="m-auto w-[200px] mb-3">
                <p class="py-3">Blogs Data does not exist <br> If admin post a new blog, it will appear here</p>
            </div>
        @endif
        @if ($blogs->hasPages())
            <div class="py-2 bg-gray-100 mt-2 rounded-lg">
                {{ $blogs->links() }}
            </div>
        @endif
    </div>
</section>
@endsection