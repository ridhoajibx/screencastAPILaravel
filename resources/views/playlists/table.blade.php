<x-app-layout>
    <x-slot name="title">
        Your playlist
    </x-slot>
    <x-slot name="header">
        Your playlist
    </x-slot>
    <div class="text-sm text-gray-700">
        <x-table>
            <tr>
                <x-th>#</x-th>
                <x-th>Name</x-th>
                <x-th>Price</x-th>
                <x-th>Published</x-th>
                <x-th>Action</x-th>
            </tr>

            @foreach ($playlists as $item)
            <tr>
                <x-td>{{ $playlists->count() * ($playlists->currentPage() - 1) + $loop->iteration }}</x-td>
                <x-td>{{ $item->name }}</x-td>
                <x-td>{{ $item->price }}</x-td>
                <x-td>{{ $item->created_at->format('d-m-Y') }}</x-td>
                <x-td>
                    <a 
                        class="text-blue-500 hover:text-blue-600 underline font-medium text-xs uppercase"
                        href={{ route('edit.playlists', $item->slug) }}>Edit</a>
                    <a 
                    class="text-red-500 hover:text-red-600 underline font-medium text-xs uppercase"
                        href="#">Delete</a>
                </x-td>
            </tr>
            @endforeach
        </x-table>
        {{ $playlists->links() }}
    </div>
</x-app-layout>