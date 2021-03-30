<x-app-layout>
    <x-slot name="title">
        Edit playlist
    </x-slot>
    {{-- @slot('title')
        Create playlist
    @endslot --}}
    <div class="p-5">
        Update playlist
        <div class="text-sm text-gray-400 mt-4">
            <form action={{ route('edit.playlists') }} method="put" enctype="multipart/form-data">
                @include('playlists._form-control', ['submit' => 'Update'])
            </form>
        </div>
    </div>
</x-app-layout>
