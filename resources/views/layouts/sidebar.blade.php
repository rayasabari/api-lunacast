<div class="w-1/5 min-h-screen bg-indigo-700 text-indigo-100 p-5">
    <div class=" mb-5 px-2">
        <a href="#" class="font-semibold text-2xl text-white transition duration-300">Lunacast</a>
    </div>
    <div class="mb-5">
        <div class="p-2">
            <div class=" uppercase text-indigo-300 tracking-wide text-xs py-1">
                Main
            </div>
            <a href="#" class="block hover:text-white py-1">Dashboard</a>
        </div>
    </div>
    @can('create playlists')
        <div class="mb-5">
            <div class="p-2">
                <div class=" uppercase text-indigo-300 tracking-wide text-xs py-1">
                    Playlist
                </div>
                <a href="{{ route('playlists.create') }}" class="block hover:text-white py-1">Create</a>
                <a href="{{ route('playlists.index') }}" class="block hover:text-white py-1">Index</a>
            </div>
        </div>
    @endcan
    @can('create tags')
        <div class="mb-5">
            <div class="p-2">
                <div class=" uppercase text-indigo-300 tracking-wide text-xs py-1">
                    Tags
                </div>
                <a href="#" class="block hover:text-white py-1">Create</a>
                <a href="#" class="block hover:text-white py-1">Index</a>
            </div>
        </div>
    @endcan
    @can('show users')
        <div class="mb-5">
            <div class="p-2">
                <div class=" uppercase text-indigo-300 tracking-wide text-xs py-1">
                    Users
                </div>
                <a href="#" class="block hover:text-white py-1">Create</a>
                <a href="#" class="block hover:text-white py-1">Index</a>
            </div>
        </div>
    @endcan
    <div class="mb-5">
        <div class="p-2">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="block hover:text-white py-1" href="route('logout')"
                    onclick="event.preventDefault(); this.closest('form').submit();">
                    {{ __('Log Out') }}
                </a>
            </form>
        </div>
    </div>
</div>
