<x-app-layout>
  <x-slot name="title">
    Edit New Playlist
  </x-slot>
  <div class="p-5">
    <x-breadcrumb>
      <x-slot name="title">
        <a href="{{ route('playlists.index') }}">Playlist</a>
      </x-slot>
      Edit
    </x-breadcrumb>
    <x-card>
      <x-slot name="header">
        {{ $playlist->name }}
      </x-slot>
      <div class="w-full lg:w-1/3 rounded-xl mb-4 overflow-hidden">
        <img class="w-full" src="{{ $playlist->picture }}" alt="{{ $playlist->name }}">
      </div>
      <form action="{{ route('playlists.edit', $playlist->slug) }}" method="post" novalidate enctype="multipart/form-data">
        @method('put')
        @include('playlists._form-control', ['submit' => 'Update'])
      </form>
    </x-card>
  </div>
</x-app-layout>