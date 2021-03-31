<x-app-layout>
    <x-slot name="title">
        Dashboard
    </x-slot>
    <x-slot name="header">
        Dashboard
    </x-slot>
    <div class="text-sm text-gray-700">
        Welcome back, <strong>{{ $user->name }}</strong>
        <div class="font-medium text-sm text-gray-700 uppercase underline">
            @foreach ($user->roles as $role)
                {{ $role->name }}
            @endforeach
        </div>
    </div>
</x-app-layout>
