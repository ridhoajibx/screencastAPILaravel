<x-app-layout>
    <x-slot name="title">
        Create Tag
    </x-slot>
    <x-slot name="header">
        Create Tag
    </x-slot>
    <div class="text-sm text-gray-700 mt-4">
        <form action={{ route('create.tags') }} method="post">
            @include('tags._form-control', ['submit' => 'Create'])
        </form>
    </div>
</x-app-layout>