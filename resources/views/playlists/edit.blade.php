<x-app-layout>
  <x-slot name="title">
    {{ $title }}
  </x-slot>
  <div class="p-5">
    <x-breadcrumb>
      <x-slot name="link">{{route('tags.index')}}</x-slot>
      <x-slot name="title">{{ $breadcrumb[0] }}</x-slot>
      {{ $breadcrumb[1] }}
    </x-breadcrumb>
    <x-card>
      <x-slot name="header">
        {{ $playlist->name }}
      </x-slot>
      <div class="w-full mb-4 overflow-hidden lg:w-1/3 rounded-xl">
        <img class="w-full" src="{{ $playlist->picture }}" alt="{{ $playlist->name }}">
      </div>
      <form action="{{ route('playlists.edit', $playlist->slug) }}" method="post" novalidate enctype="multipart/form-data">
        @method('put')
        @include('playlists._form-control', ['submit' => 'Update'])
      </form>
    </x-card>
  </div>
</x-app-layout>