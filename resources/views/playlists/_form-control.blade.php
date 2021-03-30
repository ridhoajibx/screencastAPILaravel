@csrf
<div class="my-4">
    <x-label for="thumbnail" :value="__('Image')" />

    <x-input id="thumbnail" class="block mt-1 w-full" type="file" name="thumbnail" :value="old('thumbnail')" />
    @error('thumbnail')
        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
    @enderror
</div>
<div class="my-4">
    <x-label for="name" :value="__('Name')" />

    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
    @error('name')
        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
    @enderror
</div>
<div class="my-4">
    <x-label for="price" :value="__('Price')" />

    <x-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price')" required />
    @error('price')
        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
    @enderror
</div>
<div class="my-4">
    <x-label for="description" :value="__('Description')" />

    <x-textarea id="description" class="block mt-1 w-full" name="description" :value="old('description')" required>
    </x-textarea>
    @error('description')
        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
    @enderror
</div>
<x-button>{{ $submit }}</x-button>