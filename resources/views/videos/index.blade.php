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
    <x-table>
      <thead>
        <x-tr class="hover:bg-white">
          <x-th class="text-center" width="5%">#</x-th>
          <x-th>Title</x-th>
          <x-th class="text-center">Action</x-th>
        </x-tr>
      </thead>
      <tbody>
        @foreach ($videos as $key => $video)
        <x-tr>
          <x-td class="text-center">
            {{ ($videos ->currentPage()-1) * $videos->perPage() + $loop->index + 1}}</x-td>
          <x-td>{{ $video->title }}</x-td>
          <x-td>
            <div class="flex items-center justify-center">
              <a href="{{ route('videos.edit', $video->slug) }}" class="text-indigo-600 hover:text-indigo-700 hover:underline">Edit</a>
            </div>
          </x-td>
        </x-tr>
        @endforeach
      </tbody>
    </x-table>
    <div class="mt-4">
      {{ $videos->links() }}
    </div>
  </div>
</x-app-layout>