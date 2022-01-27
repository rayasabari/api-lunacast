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
				<tr class="bg-white">
					<x-th class="text-center" width="5%">#</x-th>
					<x-th>Name</x-th>
					<x-th>Published</x-th>
					<x-th>Action</x-th>
				</tr>
			</thead>
			<tbody>
				@foreach ($playlists as $key => $playlist)
				<tr class="{{ ($key + 1) % 2 == 0 ? 'bg-white' : 'bg-gray-50' }} hover:bg-gray-600 hover:text-gray-50 transition duration-300">
					<x-td class="text-center">{{ $playlists->count() * ($playlists->currentPage() - 1) + $loop->iteration}}</x-td>
					<x-td>{{ $playlist->name }}</x-td>
					<x-td>{{ $playlist->created_at->diffForHumans() }}</x-td>
					<x-td>Edit</x-td>
				</tr>
				@endforeach
			</tbody>
		</x-table>
		<div class="mt-4">
			{{ $playlists->links() }}
		</div>
	</div>
</x-app-layout>