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
                <x-th>Action</x-th>
            </tr>

            @foreach ($videos as $item)
            <tr>
                <x-td>
                    {{ $videos->currentPage() * $videos->perPage() - ($videos->perPage()) + $loop->iteration }}
                </x-td>
                <x-td>{{ $item->title }}</x-td>
                <x-td>
                    <div class="flex items-center">
                        <a class="text-blue-500 hover:text-blue-600 underline font-medium text-xs uppercase mx-2"
                            href="#">
                            Edit
                        </a>
                        </div>
                    </div>
                </x-td>
            </tr>
            @endforeach
        </x-table>
        {{ $videos->links() }}
    </div>
</x-app-layout>