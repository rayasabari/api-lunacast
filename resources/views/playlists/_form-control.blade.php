@csrf
<div class="mb-5">
	<x-input-file type="file" id="thumbnail" name="thumbnail" />
	@error('thumbnail')
	<div class="text-rose-600 text-xs mt-1">{{ $message }}</div>
	@enderror
</div>
<div class="mb-5">
	<x-label for="name" :value="__('Name')" />
	<x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name') ?? $playlist->name" required />
	@error('name')
	<div class="text-rose-600 text-xs mt-1">{{ $message }}</div>
	@enderror
</div>
<div class="mb-5">
	<x-label for="price" :value="__('Price')" />
	<x-input id="price" class="block mt-1 w-full" type="text" name="price" :value="old('price') ?? $playlist->price" required />
	@error('price')
	<div class="text-rose-600 text-xs mt-1">{{ $message }}</div>
	@enderror
</div>
<div class="mb-5">
	<x-label for="description" :value="__('Description')" />
	<x-textarea id="description" class="block mt-1 w-full" type="text" name="description" required>{{ old('description') ?? $playlist->description }}</x-textarea>
	@error('description')
	<div class="text-rose-600 text-xs mt-1">{{ $message }}</div>
	@enderror
</div>
<div>
	<x-button>{{ $submit }}</x-button>
</div>