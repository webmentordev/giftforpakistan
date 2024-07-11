@extends('layouts.profile')
@section('content')
    <div class="box w-full px-4">
        <h1 class="text-3xl mb-3 font-bold text-dark">Hello, {{ auth()->user()->name }}</h1>
        <p>From your account dashboard. you can easily check & view your <a href="{{ route('orders') }}" class="text-main underline">recent orders</a>, manage your shipping and <a href="{{ route('setting') }}" class="text-main underline">billing addresses</a> and edit your password and account details.</p>
    </div>
@endsection