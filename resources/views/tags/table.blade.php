<x-app-layout>
    <x-slot name="title">
        Tags
    </x-slot>
    <x-slot name="header">
        Tags
    </x-slot>
    <div class="text-sm text-gray-700">
        <x-table>
            <tr>
                <x-th>#</x-th>
                <x-th>Name</x-th>
                <x-th>Published</x-th>
                <x-th>Action</x-th>
            </tr>

            @foreach ($tags as $item)
            <tr>
                <x-td>{{ $tags->count() * ($tags->currentPage()-1) + $loop->iteration }}</x-td>
                <x-td>
                    <div>{{ $item->name }}</div>
                </x-td>
                <x-td>{{ $item->created_at->format('d-m-Y') }}</x-td>
                <x-td>
                    <div class="flex items-center">
                        <a class="text-blue-500 hover:text-blue-600 underline font-medium text-xs uppercase mr-2"
                            href={{ route('edit.tags', $item->slug) }}>
                            Edit
                        </a>

                        <div x-data="{ open:false }">
                            <x-modal state="open" x-show="open" title="{{ $item->name }}">
                                <form action={{ route('delete.tags', $item->slug) }} method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                        class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded shadow-sm focus:outline-none font-medium text-xs uppercase text-white">
                                        Delete
                                    </button>
                                </form>
                            </x-modal>
                            <button @click="open = true"
                                class="text-red-500 hover:text-red-600 underline font-medium text-xs uppercase focus:outline-none"
                                href="#">
                                Delete
                            </button>
                        </div>
                    </div>
                </x-td>
            </tr>
            @endforeach
        </x-table>
        {{ $tags->links() }}
    </div>
</x-app-layout>