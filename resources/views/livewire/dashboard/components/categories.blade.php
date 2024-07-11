<div>
    <h2 class="text-xl font-bold mb-2">Categories Database</h2>
    @if (session('success'))
        <p class="text-green-700 py-2 ml-3">{{ session('success') }}</p>
    @endif
    <form wire:submit.prevent="create" method="POST" class="flex mb-2">
        <input type="text" name="name" placeholder="Category Name" wire:model="name" autocomplete="off"
        class="bg-white w-full py-2 px-3 rounded-md @error('name') border border-red-600 @enderror">
        <button class="bg-main hover:bg-dark hover:text-white py-2 px-4 ml-3 text-dark font-bold rounded-md">Create</button>
    </form>
    @if (count($categories) && $categories != null)
        <table class="rounded-lg overflow-hidden w-full">
            <tr class="bg-dark text-white">
                <th class="px-3 text-start">Sr#</th>
                <th class="px-3 text-start">Name</th>
                <th class="p-2 text-start">Created By</th>
                <th class="p-2 text-end">Created</th>
                <th class="p-3 text-end">Updated</th>
                <th class="p-3 text-end">Edit</th>
            </tr>
            @foreach ($categories as $key => $item)
                <tr class="bg-white border-b border-gray-200 text-sm">
                    <td class="px-3 text-start">{{ count($categories) - $key }}</td>
                    <td class="px-3 text-start font-semibold">{{ $item->name }}</td>
                    <td class="p-2 text-start">{{ $item->user->name }}</td>
                    <td class="p-2 text-end">{{ $item->created_at->diffForHumans() }}</td>
                    <td class="p-3 text-end">{{ $item->updated_at->diffForHumans() }}</td>
                    <td class="p-3 text-end" x-data="{ open: false }"><span x-on:click="open = ! open" class="text-blue-500 underline cursor-pointer">Edit</span>
                    <div x-show="open" class="fixed_class" x-cloak>
                        <div class="bg-white p-6 rounded-xl w-[500px] text-start">
                            <h2 class="text-xl font-bold text-start mb-2">Update Category</h2>
                            <form wire:submit.prevent="update({{ $item->id }})" method="post">
                                @if (session('update'))
                                    <p class="text-green-700 py-2 mb-2">{{ session('update') }}</p>
                                @endif
                                <input type="text" name="updateName" wire:model.debounce.2000ms="updateName" placeholder="Category Name" autocomplete="off" required
                                class="w-full border border-gray-200 mb-3 p-3 py-4 rounded-xl">
                                @error('updateName')
                                    <p class="text-red-500 ml-3 mb-2">{{ $message }}*</p>
                                @enderror
                                <div class="grid grid-cols-2 gap-3">
                                    <button type="submit" class="bg-main text-white py-3 rounded-lg w-full font-semibold">Update</button>
                                    <span x-on:click="open = false" class="bg-dark text-white py-3 rounded-lg w-full cursor-pointer font-semibold text-center">Close</span>
                                </div>
                            </form>
                        </div>
                    </div></td>
                </tr>
            @endforeach
        </table>
    @else
        <p class="text-red-600">No categories data exit. please add it, then it will showup here.</p>
    @endif
    @if ($categories->hasPages())
        <div class="py-2">
            {{ $categories->links() }}
        </div>
    @endif
</div>
