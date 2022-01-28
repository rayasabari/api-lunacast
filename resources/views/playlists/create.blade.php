<x-app-layout>
  <x-slot name="title">
    Create New Playlist
  </x-slot>
  <div class="p-5">
    <x-breadcrumb>
      <x-slot name="title">
        <a href="{{ route('playlists.index') }}">Playlists</a>
      </x-slot>
      Create
    </x-breadcrumb>
    <x-card>
      <x-slot name="header">
        New Playlist
      </x-slot>
      <form action="{{ route('playlists.create') }}" method="post" novalidate enctype="multipart/form-data">
        @include('playlists._form-control', ['submit' => 'Create'])
      </form>
    </x-card>
  </div>
</x-app-layout>