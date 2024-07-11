<div>
    <h2 class="text-xl font-bold mb-3">Users Database</h2>
    @if (count($users) && $users != null)
        <table class="rounded-lg overflow-hidden w-full">
            <tr class="bg-dark text-white">
                <th class="px-3 text-start">Name</th>
                <th class="p-2 text-start">Email</th>
                <th class="p-2 text-start">Address</th>
                <th class="p-2 text-end">Verified</th>
                <th class="p-2 text-end">Administrator</th>
                <th class="p-3 text-end">Created</th>
            </tr>
            @foreach ($users as $key => $item)
                <tr class="bg-white border-b border-gray-200 text-sm">
                    <td class="px-3 text-start font-semibold">{{ $item->name }}</td>
                    <td class="p-2 text-start">{{ $item->email }}</td>
                    <td class="p-3 text-start" x-data="{ open: false }"><span x-on:click="open = ! open" class="text-blue-500 underline cursor-pointer">Show</span>
                        <div x-show="open" class="fixed_class" x-on:click="open = false" x-cloak>
                            <div class="bg-white p-6 rounded-xl w-[500px] text-start">
                                <h2 class="text-xl font-bold text-start mb-2">Address of: <span class="font-normal">{{ $item->name }}</span></h2>
                                <p>{{ $item->address }}</p>
                            </div>
                        </div></td>
                    <td class="p-2 text-end">
                    @if ($item->email_verified_at != null)
                        <i class="p-2 px-[0.5rem] bg-green-700 bg-opacity-20 text-green-700 rounded-full font-bold fas fa-check"></i>
                    @else
                        <i class="p-2 px-3 bg-red-700 bg-opacity-20 text-red-700 rounded-full font-bold fas fa-times"></i>
                    @endif </td>
                    <td class="p-2 text-end">
                        @if ($item->is_admin == true)
                            <i class="p-2 px-[0.5rem] bg-green-700 bg-opacity-20 text-green-700 rounded-full font-bold fas fa-check"></i>
                        @else
                            <i class="p-2 px-3 bg-red-700 bg-opacity-20 text-red-700 rounded-full font-bold fas fa-times"></i>
                        @endif </td>
                    <td class="p-2 text-end">{{ $item->created_at->format('M d, Y') }}</td>
                </tr>
            @endforeach
        </table>
    @else
        <p class="text-red-600">No users data exit. please add it, then it will showup here.</p>
    @endif
    @if ($users->hasPages())
        <div class="py-2">
            {{ $users->links() }}
        </div>
    @endif
</div>
