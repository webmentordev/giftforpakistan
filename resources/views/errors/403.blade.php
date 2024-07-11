@extends('layouts.errors')
@section('title', '403 | Forbidden')
@section('content')
<section class="py-[50px] px-4">
    <div class="container m-auto" style="max-width: 660px;">
        <div class="w-full h-[50vh] flex justify-center items-center">
            <div class="text-center">
                <h1 class="text-5xl mb-3 font-bold text-dark">403 <br> <span class="text-main">Forbidden</span></h1>
                <p>Sorry! following action is Forbidden!</p>
                <button class="bg-main text-white text-lg py-2 px-4 rounded-lg mt-3 inline-block font-bold" onclick="history.back()">Go Back &rarrb;</button>
            </div>
        </div>
    </div>
</section>
@endsection