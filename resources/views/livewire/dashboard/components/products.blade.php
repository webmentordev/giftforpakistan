<div>
    <div class="flex justify-between items-center mb-3">
        <h2 class="text-xl font-bold">Products Database</h2>
        <a href="{{ route('create.product') }}" target="_blank" class="py-2 px-4 rounded-lg bg-dark text-white">Create Product</a>
    </div>
    @if (count($products) && $products != null)
    <table class="rounded-lg overflow-hidden w-full">
        <tr class="bg-dark text-white">
            <th class="px-3 text-start">Image</th>
            <th class="px-3 text-start">Name</th>
            <th class="px-3 text-start">Category</th>
            <th class="px-3 text-start">Price/Unit</th>
            <th class="px-3 text-end">CreatedBy</th>
            <th class="px-3 text-end">Status</th>
            <th class="p-3 text-end">Created</th>
            <th class="p-3 text-end">Updated</th>
            <th class="p-3 text-end">Edit</th>
        </tr>
        @foreach ($products as $key => $item)
            <tr class="bg-white border-b border-gray-200 text-sm">
                <td class="px-3 py-3 text-start"><a href="{{ asset('storage/'.$item->thumb) }}" target="_blank"><img src="{{ asset('storage/'.$item->thumb) }}" class="w-[60px] h-[60px] object-fit" alt="ProductImage"></a></td>
                <td class="px-3 py-3 text-start font-semibold">{{ $item->name }}</td>
                <td class="px-3 text-start">{{ $item->category->name }}</td>
                <td class="p-3 text-start font-bold"><span class="text-main">PKR</span> {{ number_format($item->price, 2) }}</td>
                <td class="p-3 text-end font-bold">{{ $item->user->name }}</td>
                <td class="p-2 text-end">
                    @if ($item->is_active == true)
                        <i class="p-2 px-[0.5rem] bg-green-700 bg-opacity-20 text-green-700 rounded-full font-bold fas fa-check"></i>
                    @else
                        <i class="p-2 px-3 bg-red-700 bg-opacity-20 text-red-700 rounded-full font-bold fas fa-times"></i>
                    @endif </td>
                <td class="p-3 text-end">{{ $item->created_at->format('M d, Y h:i:s A') }}</td>
                <td class="p-3 text-end">{{ $item->updated_at->format('M d, Y') }}</td>
                <td class="p-3 text-end"><a href="{{ route('update.product', $item->id) }}" target="_blank" class="text-blue-500 underline">Edit</a></td>
            </tr>
        @endforeach
    </table>
    @else
        <p class="text-red-600 ml-3">No contacts data exit. Contacts will appear here.</p>
    @endif
    @if ($products->hasPages())
        <div class="py-2">
            {{ $products->links() }}
        </div>
    @endif
</div>
