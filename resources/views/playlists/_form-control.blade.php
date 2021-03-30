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

    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name') ?? $playlist->name" required autofocus />
    @error('name')
        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
    @enderror
</div>
<div class="my-4">
    <x-label for="price" :value="__('Price')" />

    <x-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price') ?? $playlist->price" required />
    @error('price')
        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
    @enderror
</div>
<div class="my-4">
    <x-label for="description" :value="__('Description')" />

    <x-textarea id="description" class="block mt-1 w-full" name="description" required>
        {{ old('description') ?? $playlist->description }}
    </x-textarea>
    @error('description')
        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
    @enderror
</div>

<div class="my-4">
    <x-label for="tags" :value="__('Tags')" />

<select multiple id="tags" name="tags[]" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" >
        @foreach ($tags as $tag)
            <option {{ $playlist->tags()->find($tag->id) ? 'selected' : '' }} value={{ $tag->id }}>{{ $tag->name }}</option>
        @endforeach
    </select>
</div>
<x-button>{{ $submit }}</x-button>