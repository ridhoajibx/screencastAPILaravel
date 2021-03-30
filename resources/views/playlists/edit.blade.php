<x-app-layout>
    <x-slot name="title">
        Edit playlist : {{ $playlist->name }}
    </x-slot>
    <x-slot name="header">
        Edit playlist : {{ $playlist->name }}
    </x-slot>

    <div class="w-full lg:w-1/2">
        <img class="w-full mb-6 rounded" src={{ $playlist->picture }} alt={{ $playlist->name }}>
    </div>
    <div class="text-sm text-gray-700 mt-4">
        <form action={{ route('edit.playlists', $playlist->slug) }} method="post" enctype="multipart/form-data">
            @method('PUT')
            @include('playlists._form-control', ['submit' => 'Update'])
        </form>
    </div>
</x-app-layout>