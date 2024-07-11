<div>
    <h2 class="text-xl font-bold">Orders Database</h2>
    @if (count($orders) && $orders != null)
    <table class="rounded-lg overflow-hidden w-full">
        <tr class="bg-dark text-white">
            <th class="px-3 text-start">Order</th>
            <th class="px-3 text-start">Name</th>
            <th class="px-3 text-start">Quantity</th>
            <th class="px-3 text-start">Price/Unit</th>
            <th class="px-3 text-start">PlacedBy</th>
            <th class="py-3 text-end">Status</th>
            <th class="p-3 text-end">Created</th>
            <th class="p-3 text-end">Updated</th>
            <th class="p-3 text-end">Details</th>
        </tr>
        @foreach ($orders as $key => $item)
            <tr class="bg-white border-b border-gray-200 text-sm">
                <td class="p-3 text-start font-bold">{{ $item->order_number }}</td>
                <td class="p-3 text-start">{{ $item->product->name }}</td>
                <td class="p-3 text-start font-bold">{{ $item->quantity }}x</td>
                <td class="p-3 text-start">R.s {{ $item->product->price }}</td>
                <td class="p-3 text-start font-bold">{{ $item->user->email }}</td>
                <td class="py-3 text-start">
                    @if ($item->status == 'pending')
                        <span class="py-2 px-2 bg-yellow-300 font-bold text-yellow-800 rounded-xl">Pending</span>
                    @elseif ($item->status == 'shipping')
                        <span class="py-2 px-2 bg-blue-300 font-bold text-blue-800 rounded-xl">Shipping <i class="fas fa-truck-fast"></i></span>
                    @elseif ($item->status == 'delivered')
                        <span class="py-2 px-2 bg-green-300 font-bold text-green-800 rounded-xl">Delivered <i class="fas fa-check"></i></span>
                    @endif
                </td>
                <td class="p-3 text-end">{{ $item->created_at->format('M d, Y') }}</td>
                <td class="p-3 text-end">{{ $item->updated_at->format('M d, Y') }}</td>
                <td class="p-3 text-end" x-data="{ open: false }"><span class="text-blue-500 underline cursor-pointer" wire:click="calculate({{ $item->order_number }})" x-on:click="open = ! open">View</span>
                    <div x-show="open" x-cloak class="fixed top-0 left-0 w-full z-[9999] h-full bg-black bg-opacity-80 flex items-center justify-center">
                        <div class="w-[600px] p-6 rounded-lg bg-white text-start">
                            <h2 class="text-3xl">Update Status</h2>
                            <p wire:target="updateStatus" wire:loading class="text-green-600 my-2">Processing....</p>
                            @if (session('success'))
                                <p class="text-green-800 font-bold my-2 bg-green-700 bg-opacity-10 w-full text-center p-6">{{ session('success') }}</p>
                            @elseif (session('failed'))
                                <p class="text-red-800 font-bold my-2 bg-red-700 bg-opacity-10 w-full text-center p-6">{{ session('failed') }}</p>
                            @endif
                            <ul class="mb-3 text-[16px]">
                                <li class="my-2"><strong>Customer Name:</strong> {{ $item->customer->name }}</li>
                                <li class="my-2"><strong>Phone Number:</strong> {{ $item->customer->phone_number }}</li>
                                <li class="my-2"><strong>Address:</strong> {{ $item->customer->address }}</li>
                                <li class="my-2"><strong>PlacedBy:</strong> {{ $item->user->name }} | {{ $item->user->email }}</li>
                            </ul>
                            
                            @if ($fetched != null && count($fetched))
                                <div class="bg-gray-200 border border-gray-300 mb-6">
                                    <?php $total = 0; ?>
                                    @foreach ($fetched as $data)
                                        <div class="flex justify-between p-2 border-b @if(!$loop->last) border-gray-300 @endif">
                                            <div class="flex flex-col">
                                                <p>{{ $data->product->name }} <strong>x{{ $data->quantity }}</strong></p>
                                            </div>
                                            <span class="font-bold">Rs. {{ $data->price }}</span>
                                        </div>
                                        <?php $total = $total + $data->price ?>
                                    @endforeach
                                </div>
                                <span class="text-dark font-bold text-xl">Total Price: Rs. {{ number_format($total, 2) }}</span>
                            @endif
                            <form wire:submit.prevent="updateStatus({{ $item->order_number }})" method="POST" class="mt-3">
                                @if ($item->status == "pending")
                                    <select name="status" id="status" wire:model="status"
                                    class="border border-gray-300 rounded-lg p-2 text-gray-500 w-full">
                                        <option value="pending" selected class="capitalize">Pending</option>
                                        <option value="shipping">Shipping</option>
                                    </select>
                                @elseif ($item->status == "shipping")
                                    <select name="status" id="status" wire:model.debounce.2000="status"
                                    class="border border-gray-300 rounded-lg p-2 text-gray-500 w-full">
                                        <option value="shipping" selected>Shipping</option>
                                        <option value="delivered">Delivered</option>
                                    </select>
                                @elseif ($item->status == "delivered")
                                    <span class="border border-gray-300 rounded-lg p-2 text-gray-500 w-full">Delivered</span>
                                @endif
                                <div class="flex">
                                    <button class="bg-main text-white p-3 rounded-xl mt-3 mr-3" type="submit">Confirm Change</button>
                                    <span class="bg-red-500 text-white p-3 rounded-xl mt-3 cursor-pointer" x-on:click="open = false">Close</span>
                                </div>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
    @else
        <p class="text-red-600">No Orders placed data exit.</p>
    @endif
    @if ($orders->hasPages())
        <div class="py-2">
            {{ $orders->links() }}
        </div>
    @endif
</div>
