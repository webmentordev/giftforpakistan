<div>
    <div class="flex justify-between items-center mb-3">
        <h2 class="text-xl font-bold mb-2">Blogs Database</h2>
        <a href="{{ route('blog.create') }}" target="_blank" class="py-2 px-4 rounded-lg bg-dark text-white">Create Blog</a>
    </div>
    @if (count($blogs) && $blogs != null)
    <table class="rounded-lg overflow-hidden w-full">
        <tr class="bg-dark text-white">
            <th class="text-start px-3 py-4">Title</th>
            <th>Slug</th>
            <th class="text-start px-3">Tags</th>
            <th>Posted</th>
            <th class="text-start px-3">LastUpdated</th>
            <th class="text-end">Visit</th>
            <th class="text-end px-3">Edit</th>
        </tr>
        @foreach ($blogs as $key => $item)
            <tr class="bg-white border-b border-gray-200 text-sm">
                <td class="text-start px-3 py-2">{{ $item->title }}</td>
                <td>{{ $item->slug }}</td>
                <td class="text-start px-3">{{ $item->tags }}</td>
                <td>{{ $item->created_at->format('M d, Y') }}</td>
                <td class="text-start px-3">{{ $item->updated_at->format('M d, Y') }}</td>
                <td class="text-end"><a href="{{ route('blog.read', $item->slug) }}" class="text-blue-600 underline">Visit</a></td>
                <td class="text-end px-3"><a href="{{ route('blog.update', $item->id) }}" class="text-blue-600 underline">Edit</a></td>
            </tr>
        @endforeach
    </table>
    @else
        <p class="text-red-600 ml-3">No Blogs data exit. Contacts will appear here.</p>
    @endif
    @if ($blogs->hasPages())
        <div class="py-2">
            {{ $blogs->links() }}
        </div>
    @endif
</div>
