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
        Edit Tags
      </x-slot>
      <form action="{{ route('tags.edit', $tag->slug) }}" method="post" novalidate enctype="multipart/form-data">
        @method('put')
        @include('tags._form-control', ['submit' => 'Update'])
      </form>
    </x-card>
  </div>
</x-app-layout>