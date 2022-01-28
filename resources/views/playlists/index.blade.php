<x-app-layout>
	<x-slot name="title">
		Your Playlists
	</x-slot>
	<div class="p-5">
		<x-breadcrumb>
			<x-slot name="title">Playlists</x-slot>
			Index
		</x-breadcrumb>
		<x-table>
			<thead>
				<x-tr>
					<x-th class="text-center" width="5%">#</x-th>
					<x-th>Name</x-th>
					<x-th>Published</x-th>
					<x-th class="text-center">Action</x-th>
				</x-tr>
			</thead>
			<tbody>
				@foreach ($playlists as $key => $playlist)
				<x-tr>
					<x-td class="text-center">{{ $playlists->count() * ($playlists->currentPage() - 1) + $loop->iteration}}</x-td>
					<x-td>{{ $playlist->name }}</x-td>
					<x-td><span class="text-gray-400">{{ $playlist->created_at->diffForHumans() }}</span></x-td>
					<x-td class="text-center">
						<a href="{{ route('playlists.edit', $playlist->slug) }}" class="text-indigo-500">Edit</a>
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