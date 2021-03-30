<x-app-layout>
    <x-slot name="title">
        Edit Tag : {{ $tag->name }}
    </x-slot>
    <x-slot name="header">
        Edit Tag: {{ $tag->name }}
    </x-slot>
    <div class="text-sm text-gray-700 mt-4">
        <form action={{ route('edit.tags', $tag->slug) }} method="post" >
            @method('PUT')
            @include('tags._form-control', ['submit' => 'Update'])
        </form>
    </div>
</x-app-layout>