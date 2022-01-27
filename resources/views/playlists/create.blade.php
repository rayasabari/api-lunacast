<x-app-layout>
  <x-slot name="title">
    Create New Playlist
  </x-slot>
  <div class="p-5">
    <x-breadcrumb>
      <x-slot name="title">Playlists</x-slot>
      Create
    </x-breadcrumb>
    <form action="{{ route('playlists.create') }}" method="post" novalidate enctype="multipart/form-data">
      @include('playlists._form-control', ['submit' => 'Create'])
    </form>
  </div>
</x-app-layout>