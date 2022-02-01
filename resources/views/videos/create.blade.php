<x-app-layout>
  <x-slot name="title">
    {{ $title }}
  </x-slot>
  <div class="p-5">
    <x-breadcrumb>
      <x-slot name="link">{{route('playlists.index')}}</x-slot>
      <x-slot name="title">{{ $breadcrumb[0] }}</x-slot>
      <x-slot name="subtitle">{{ $breadcrumb[2] }}</x-slot>
      {{ $breadcrumb[1] }}
    </x-breadcrumb>
    <x-card>
      <x-slot name="header">
        New Video: {{ $playlist->name }}
      </x-slot>
      <form action="{{ route('videos.create', $playlist->slug) }}" method="post" novalidate enctype="multipart/form-data">
        @include('videos._form-control', ['submit' => 'Add'])
      </form>
    </x-card>
  </div>
</x-app-layout>