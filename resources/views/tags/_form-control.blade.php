@csrf
<div class="my-4">
    <x-label for="name" :value="__('Name')" />

    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name') ?? $tag->name" required autofocus />
    @error('name')
        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
    @enderror
</div>
<x-button>{{ $submit }}</x-button>