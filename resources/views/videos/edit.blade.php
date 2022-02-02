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
        Edit Video: {{ $video->title }}
      </x-slot>
      <form action="{{ route('videos.edit', $video->slug) }}" method="post" novalidate enctype="multipart/form-data">
        @method('put')
        @include('videos._form-control', ['submit' => 'Update'])
      </form>
    </x-card>
  </div>
</x-app-layout>