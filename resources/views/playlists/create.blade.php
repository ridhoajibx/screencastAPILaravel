<x-app-layout>
    <x-slot name="title">
        Create playlist
    </x-slot>
    {{-- @slot('title')
        Create playlist
    @endslot --}}
    <div class="p-5">
        Create new playlist
        <div class="text-sm text-gray-400 mt-4">
            <form action={{ route('create.playlists') }} method="post" enctype="multipart/form-data">
                @csrf
                <div class="my-4">
                    <x-label for="thumbnail" :value="__('Image')" />
    
                    <x-input id="thumbnail" class="block mt-1 w-full" type="file" name="thumbnail" :value="old('thumbnail')" />
                </div>
                <div class="my-4">
                    <x-label for="name" :value="__('Name')" />
    
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                </div>
                <div class="my-4">
                    <x-label for="price" :value="__('Price')" />
    
                    <x-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price')" required />
                </div>
                <div class="my-4">
                    <x-label for="description" :value="__('Description')" />
    
                    <x-textarea id="description" class="block mt-1 w-full" name="description" :value="old('description')" required ></x-textarea>
                </div>
                <x-button>Create</x-button>
            </form>
        </div>
    </div>
</x-app-layout>
