<div class="w-1/5 min-h-screen bg-gray-900 px-4 py-6">
    <div class="mb-8">
        <header class="font-medium text-gray-400 uppercase text-xs px-2">
            Main
        </header>
        <a class="block py-2 px-2 text-gray-200" href="/">Home</a>
        <a class="block py-2 px-2 text-gray-200" href="/dashboard">Dashboard</a>
    </div>
    @can ('create playlists')
        <div class="mb-8">
            <header class="font-medium text-gray-400 uppercase text-sm px-2">
                Playlist
            </header>
            <a class="block py-2 px-2 text-gray-200" href={{ route('create.playlists') }}>Create</a>
            <a class="block py-2 px-2 text-gray-200" href={{ route('table.playlists') }}>Table</a>
        </div>
    @endcan
    @can ('create tags')
        <div class="mb-8">
            <header class="font-medium text-gray-400 uppercase text-sm px-2">
                Category
            </header>
            <a class="block py-2 px-2 text-gray-200" href="#">Create</a>
            <a class="block py-2 px-2 text-gray-200" href="#">Table</a>
        </div>
    @endcan
    @if (Auth::user()->hasRole('admin'))    
        <div class="mb-8">
            <header class="font-medium text-gray-400 uppercase text-sm px-2">
                Users
            </header>
            <a class="block py-2 px-2 text-gray-200" href="#">Table</a>
        </div>
    @endif

    <!-- Authentication -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <a class="block py-2 px-2 text-gray-200" href="route('logout')"
                onclick="event.preventDefault();
                            this.closest('form').submit();">
            {{ __('Log out') }}
        </a>
    </form>
</div>