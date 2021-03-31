<x-app-layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <x-slot name="header">{{ $title }}</x-slot>

    <form action="{{ route('edit.videos', [$playlist->slug, $video->unique_video_id]) }}" method="post" novalidate>
        @method('put')
        @include('videos._form-control', [
            'submit' => 'Update'
        ])
    </form>
</x-app-layout>