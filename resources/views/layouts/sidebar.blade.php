<div class="w-1/5 min-h-screen p-5 text-indigo-100 bg-indigo-700">
    <div class="px-2 mb-5 ">
        <a href="#" class="text-2xl font-semibold text-white transition duration-300">Lunacast</a>
    </div>
    <div class="mb-5">
        <div class="p-2">
            <div class="py-1 text-xs tracking-wide text-indigo-300 uppercase ">
                Main
            </div>
            <a href="#" class="block py-1 hover:text-white">Dashboard</a>
        </div>
    </div>
    @can('create playlists')
        <div class="mb-5">
            <div class="p-2">
                <div class="py-1 text-xs tracking-wide text-indigo-300 uppercase ">
                    Playlist
                </div>
                <a href="{{ route('playlists.create') }}" class="block py-1 hover:text-white">Create</a>
                <a href="{{ route('playlists.index') }}" class="block py-1 hover:text-white">Index</a>
            </div>
        </div>
    @endcan
    @can('create tags')
        <div class="mb-5">
            <div class="p-2">
                <div class="py-1 text-xs tracking-wide text-indigo-300 uppercase ">
                    Tags
                </div>
                <a href="{{ route('tags.create') }}" class="block py-1 hover:text-white">Create</a>
                <a href="{{ route('tags.index') }}" class="block py-1 hover:text-white">Index</a>
            </div>
        </div>
    @endcan
    @can('show users')
        <div class="mb-5">
            <div class="p-2">
                <div class="py-1 text-xs tracking-wide text-indigo-300 uppercase ">
                    Users
                </div>
                <a href="#" class="block py-1 hover:text-white">Create</a>
                <a href="#" class="block py-1 hover:text-white">Index</a>
            </div>
        </div>
    @endcan
    <div class="mb-5">
        <div class="p-2">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="block py-1 hover:text-white" href="route('logout')"
                    onclick="event.preventDefault(); this.closest('form').submit();">
                    {{ __('Log Out') }}
                </a>
            </form>
        </div>
    </div>
</div>
