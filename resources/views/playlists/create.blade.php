<x-app-layout>
    <x-slot name="title">
        Create playlist
    </x-slot>
    <x-slot name="header">
        Create playlist
    </x-slot>
    <div class="text-sm text-gray-700 mt-4">
        <form action={{ route('create.playlists') }} method="post" enctype="multipart/form-data" novalidate>
            @include('playlists._form-control', ['submit' => 'Create'])
        </form>
    </div>
</x-app-layout>