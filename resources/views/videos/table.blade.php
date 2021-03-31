<x-app-layout>
    <x-slot name="title">
        {{ $title }}
    </x-slot>
    <x-slot name="header">
        {{ $title }}
    </x-slot>
    <div class="text-sm text-gray-700">
        <x-table>
            <tr>
                <x-th>#</x-th>
                <x-th>Title</x-th>
                <x-th>Intro</x-th>
                <x-th>Action</x-th>
            </tr>

            @foreach ($videos as $item)
            <tr>
                <x-td>
                    {{ $videos->currentPage() * $videos->perPage() - ($videos->perPage()) + $loop->iteration }}
                </x-td>
                <x-td>{{ $item->title }}</x-td>
                <x-td>
                    <span class="text-xs font-semibold uppercase">{{ $item->intro ? "Yes" : "No" }}</span>
                </x-td>
                <x-td>
                    <div class="flex items-center">
                        <a class="text-blue-500 hover:text-blue-600 underline font-medium text-xs uppercase mr-2"
                            href={{ route('edit.videos', [$playlist, $item->unique_video_id]) }}>
                            Edit
                        </a>

                        <div x-data="{ open:false }" class="inline-flex">
                            <x-modal state="open" x-show="open" title="{{ $item->title }}">
                                <form action={{ route('delete.videos', [$playlist, $item->unique_video_id]) }} method="post">
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
                    </div>
                </x-td>
            </tr>
            @endforeach
        </x-table>
        {{ $videos->links() }}
    </div>
</x-app-layout>