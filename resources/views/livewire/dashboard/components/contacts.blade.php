<div>
    <h2 class="text-xl font-bold">Contacts Database</h2>
    @if (count($contacts) && $contacts != null)
        <table class="rounded-lg overflow-hidden w-full">
            <tr class="bg-dark text-white">
                <th class="px-3 text-start">Name</th>
                <th class="px-3 text-start">Email</th>
                <th class="px-3 text-start">Message</th>
                <th class="p-3 text-end">Contacted</th>
            </tr>
            @foreach ($contacts as $key => $item)
                <tr class="bg-white border-b border-gray-200 text-sm">
                    <td class="px-3 py-3 text-start font-semibold">{{ $item->name }}</td>
                    <td class="px-3 text-start">{{ $item->email }}</td>
                    <td class="p-3 text-start" x-data="{ open: false }"><span x-on:click="open = ! open" class="text-blue-500 underline cursor-pointer">Show</span>
                        <div x-show="open" class="fixed_class" x-on:click="open = false" x-cloak>
                            <div class="bg-white p-6 rounded-xl w-[500px] text-start">
                                <p>{{ $item->message }}</p>
                            </div>
                    </div></td>
                    <td class="p-3 text-end">{{ $item->created_at->format('M d, Y') }}</td>
                </tr>
            @endforeach
        </table>
    @else
        <p class="text-red-600">No contacts data exit. Contacts will appear here.</p>
    @endif
    @if ($contacts->hasPages())
        <div class="py-2">
            {{ $contacts->links() }}
        </div>
    @endif
</div>
