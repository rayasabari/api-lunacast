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
        New Tags
      </x-slot>
      <form action="{{ route('tags.create') }}" method="post" novalidate enctype="multipart/form-data">
        @include('tags._form-control', ['submit' => 'Create'])
      </form>
    </x-card>
  </div>
</x-app-layout>