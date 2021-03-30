<x-app-layout>
    <x-slot name="title">
        Your playlist
    </x-slot>
    <div class="p-5">
        Your playlists
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
                            <a href="#">Edit</a>    
                            <a href="#">Delete</a>    
                        </x-td>
                    </tr>
                @endforeach
            </x-table>
            {{ $playlists->links() }}
        </div>
    </div>
</x-app-layout>