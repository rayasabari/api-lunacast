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
            <div class="flex items-center justify-center space-x-2">
              <a href="{{ route('videos.edit', [$playlist->slug, $video->unique_video_id]) }}" class="text-indigo-600 hover:text-indigo-700 hover:underline">Edit</a>
              <div x-data="{openModal: false}">
                <x-modal x-show="openModal" state="openModal" title="Delete Confirmation">
                  Are you sure to delete <span class="font-semibold">{{ $video->title }}</span>?
                  <div class="flex justify-end mt-6">
                    <div class="flex space-x-2">
                      <form action="{{ route('videos.delete', [$playlist->slug, $video->unique_video_id]) }}" method="post">
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
      {{ $videos->links() }}
    </div>
  </div>
</x-app-layout>