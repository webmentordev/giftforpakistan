@extends('layouts.profile')
@section('content')
    <div class="box w-full px-4">
        <h1 class="text-3xl mb-3 font-bold text-dark">Your Orders</h1>
        <p class="font-semibold text-lg mb-4">You have placed <span class="text-main">{{ $count_order }}</span> {{ Str::plural('Order', $count_order) }}</p>
        @if(count($orders) && $orders != null)
        <table class="w-full">
            <tr class="bg-gray-900 text-white py-2">
                <th class="text-sm py-2 px-2 text-start 620px:hidden">Order</th>
                <th class="text-sm py-2 px-2 text-start">Item</th>
                <th class="text-sm py-2 px-2 text-end">Status</th>
                <th class="text-sm py-2 px-2 text-end 620px:hidden">OrderPlaced</th>
                <th class="text-sm py-2 px-2 text-end">Price</th>
            </tr>
            @foreach ($orders as $item)
                <tr class="border-b border-gray-200">
                    <td class="text-sm py-2 px-2 text-start 620px:hidden">{{ $item->order_number }}</td>
                    <td class="text-sm py-2 px-2 text-start"><span class="font-bold">{{ $item->quantity }}x </span>{{ $item->product->name }}</td>
                    <td class="text-[12px] text-end py-3">
                        @if ($item->status == 'pending')
                            <span class="py-2 px-2 bg-yellow-300 font-bold text-yellow-800 rounded-xl">Processing <i class="fas fa-cog animate-spin"></i></span>
                        @elseif ($item->status == 'shipping')
                            <span class="py-2 px-2 bg-blue-300 font-bold text-blue-800 rounded-xl">Shipping <i class="fas fa-truck-fast"></i></span>
                        @elseif ($item->status == 'delivered')
                            <span class="py-2 px-2 bg-green-300 font-bold text-green-800 rounded-xl">Delivered <i class="fas fa-check"></i></span>
                        @endif
                    </td>
                    <td class="text-sm py-2 px-2 text-end 620px:hidden">{{ $item->created_at->format('M d, Y h:i:s A') }}</td>
                    <td class="text-sm py-2 px-2 text-end font-semibold">Rs. {{ $item->price }}</td>
                </tr>
            @endforeach
        </table>
        @else
            <p>You have not placed any order! they will appear in this section after you place it.</p>
        @endif
        @if($orders->hasPages())
            <div class="p-2 bg-gray-100">
                {{ $orders->links() }}
            </div>
        @endif
    </div>
@endsection