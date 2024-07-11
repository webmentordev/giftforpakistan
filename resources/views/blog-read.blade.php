@extends('layouts.apps')
@section('content')
    <div class="bg-white">
        <div class="py-8">
            <div class="max-w-4xl m-auto px-4">
                <img src="{{ asset('storage/'.$blog[0]->thumb) }}" class="rounded-lg m-auto shadow-lg w-full mb-2" alt="blog_featured_image">
                <p class="text-gray-800 text-center mb-3 text-md"><time class="created" datetime="{{ $blog[0]->created_at->tz('UTC')->toAtomString() }}" itemprop="dateCreated">{{ $blog[0]->created_at->format('M d, Y') }}</time> Written by <strong>{{ $blog[0]->user->name }}</strong></p>
                <h1 class="text-gray-800 text-center text-4xl leading-[60px]">{{ $blog[0]->title }}</h1>
                @if ($blog[0]->created_at != $blog[0]->updated_at)
                    <p class="text-gray-700 mb-[20px] text-md">Last updated - <time class="updated" datetime="{{ $blog[0]->updated_at->tz('UTC')->toAtomString() }}" itemprop="dateModified">{{ $blog[0]->updated_at->format('M d, Y') }}</time> - {{ $blog[0]->updated_at->diffForHumans() }}</p>
                @endif
            </div>
        </div>
        <main class="blog max-w-4xl m-auto py-2 px-4">
            <!--<nav class="links py-2 flex flex-wrap capitalize tags mb-6">-->
            <!--    @php-->
            <!--        $links =  explode('|', $blog[0]->tags);-->
            <!--        for ($i=0; $i < count($links); $i++) { -->
            <!--            echo '<a href="'.route('blog.tag', str_replace(' ', '-', $links[$i])).'" class="bg-main mr-2 rounded-md text-white" style="color: #fff">'.$links[$i].'</a>';-->
            <!--        }-->
            <!--    @endphp-->
            <!--</nav>-->
            {!! $blog[0]->message !!}
        </main>
    </div>
@endsection