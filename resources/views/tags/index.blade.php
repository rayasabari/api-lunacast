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
    <x-table>
      <thead>
        <x-tr class="hover:bg-white">
          <x-th class="text-center" width="5%">#</x-th>
          <x-th>Name</x-th>
          <x-th class="text-center">Playlist</x-th>
          @can('delete tags')
          <x-th class="text-center">Action</x-th>
          @endcan
        </x-tr>
      </thead>
      <tbody>
        @foreach ($tags as $key => $tag)
        <x-tr>
          <x-td class="text-center">
            {{ ($tags ->currentPage()-1) * $tags->perPage() + $loop->index + 1}}</x-td>
          <x-td>{{ $tag->name }}</x-td>
          <x-td class="text-center">{{ $tag->playlists_count }}</x-td>
          @can('delete tags')
          <x-td>
            <div class="flex items-center justify-center space-x-2">
              <a href="{{ route('tags.edit', $tag->slug) }}" class="text-indigo-500">Edit</a>
              <div x-data="{openModal: false}">
                <x-modal x-show="openModal" state="openModal" title="Delete Confirmation">
                  Are you sure to delete {{ $tag->name }}?
                  <div class="flex justify-end mt-6">
                    <div class="flex space-x-2">
                      <form action="{{ route('tags.delete', $tag->slug) }}" method="post">
                        @csrf
                        @method('delete')
                        <x-button class="bg-gray-400 hover:bg-gray-500">Yes</x-button>
                      </form>
                      <x-button @click="openModal = false" type="button">Cancel</x-button>
                    </div>
                  </div>
                </x-modal>
                <button @click="openModal = true" class="text-rose-600 focus:outline-none">
                  Delete
                </button>
              </div>
            </div>
          </x-td>
          @endcan
        </x-tr>
        @endforeach
      </tbody>
    </x-table>
    <div class="mt-4">
      {{ $tags->links() }}
    </div>
  </div>
</x-app-layout>