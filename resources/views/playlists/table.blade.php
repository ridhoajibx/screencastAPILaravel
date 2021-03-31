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
                <x-th>Videos</x-th>
                <x-th>Price</x-th>
                <x-th>Published</x-th>
                <x-th>Action</x-th>
            </tr>

            @foreach ($playlists as $item)
            <tr>
                {{-- <x-td>{{ $playlists->count() * ($playlists->currentPage() - 1) + $loop->iteration }}</x-td> --}}
                <x-td>
                    {{ $playlists->currentPage() * $playlists->perPage() - ($playlists->perPage()) + $loop->iteration }}
                </x-td>
                <x-td>
                    <div>
                        <div>{{ $item->name }}</div>
                        <div>
                            @foreach ($item->tags as $tag)
                            <span class="text-xs mr-1">{{ $tag->name }}</span>
                            @endforeach
                        </div>
                    </div>
                </x-td>
                <x-td>
                    @foreach ($item->videos as $video)
                        <div>
                            <a href="#" class="text-xs mr-1 underline hover:text-blue-500">Episode {{ $video->episode }}</a>
                        </div>
                    @endforeach
                </x-td>
                <x-td>{{ $item->price }}</x-td>
                <x-td>{{ $item->created_at->format('d-m-Y') }}</x-td>
                <x-td>
                    <div class="flex items-center">
                        <a class="text-blue-500 hover:text-blue-600 underline font-medium text-xs uppercase"
                            href={{ route('create.videos', $item->slug) }}>
                            Add Video
                        </a>

                        <a class="text-blue-500 hover:text-blue-600 underline font-medium text-xs uppercase mx-2"
                            href={{ route('edit.playlists', $item->slug) }}>
                            Edit
                        </a>

                        <div x-data="{ open:false }" class="inline-flex">
                            <x-modal state="open" x-show="open" title="{{ $item->name }}">
                                <form action={{ route('delete.playlists', $item->slug) }} method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                        class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded shadow-sm focus:outline-none font-medium text-xs uppercase text-white">
                                        Delete
                                    </button>
                                </form>
                            </x-modal>
                            <button @click="open = true"
                                class="text-red-500 hover:text-red-600 underline font-medium text-xs uppercase focus:outline-none">
                                Delete
                            </button>
                        </div>
                    </div>
                </x-td>
            </tr>
            @endforeach
        </x-table>
        {{ $playlists->links() }}
    </div>
</x-app-layout>