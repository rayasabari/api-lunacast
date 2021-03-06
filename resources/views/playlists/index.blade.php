<x-app-layout>
  <x-slot name="title">
    Your Playlists
  </x-slot>
  <div class="p-5">
    <x-breadcrumb>
      <x-slot name="link">{{route('playlists.index')}}</x-slot>
      <x-slot name="title">{{ $breadcrumb[0] }}</x-slot>
      {{ $breadcrumb[1] }}
    </x-breadcrumb>
    <x-table>
      <thead>
        <x-tr class="hover:bg-white">
          <x-th class="text-center" width="5%">#</x-th>
          <x-th>Name</x-th>
          <x-th class="text-right">Price</x-th>
          <x-th class="text-center">Published</x-th>
          <x-th class="text-center">Action</x-th>
        </x-tr>
      </thead>
      <tbody>
        @foreach ($playlists as $key => $playlist)
        <x-tr>
          <x-td class="text-center">
            {{ ($playlists ->currentPage()-1) * $playlists->perPage() + $loop->index + 1}}</x-td>
          <x-td>
            <a href="{{ route('videos.index', $playlist->slug) }}" class="block font-normal text-indigo-500 hover:underline">
              {{ $playlist->name }}
            </a>
            <div class="mt-2">
              @foreach ($playlist->tags as $tag)
              <span class="px-2 py-1 text-xs font-bold text-yellow-600 bg-yellow-300 rounded-full">{{ $tag->name }}</span>
              @endforeach
            </div>
          </x-td>
          <x-td class="text-right">{{ number_format($playlist->price, 0, ',', '.') }}</x-td>
          <x-td class="text-center"><span class="text-gray-400">{{ $playlist->created_at->diffForHumans() }}</span></x-td>
          <x-td>
            <div class="flex items-center justify-center space-x-2">
              <a href="{{ route('videos.create', $playlist->slug) }}" class="text-emerald-500">Add</a>
              <a href="{{ route('playlists.edit', $playlist->slug) }}" class="text-indigo-500">Edit</a>
              <div x-data="{openModal: false}">
                <x-modal x-show="openModal" state="openModal" title="Delete Confirmation">
                  Are you sure to delete {{ $playlist->name }} playlist?
                  <div class="flex justify-end mt-6">
                    <div class="flex space-x-2">
                      <form action="{{ route('playlists.delete', $playlist->slug) }}" method="post">
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
        </x-tr>
        @endforeach
      </tbody>
    </x-table>
    <div class="mt-4">
      {{ $playlists->links() }}
    </div>
  </div>
</x-app-layout>