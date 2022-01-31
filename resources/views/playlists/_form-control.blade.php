@csrf
<div class="mb-5">
	<x-input-file type="file" id="thumbnail" name="thumbnail" />
	@error('thumbnail')
	<div class="mt-1 text-xs text-rose-600">{{ $message }}</div>
	@enderror
</div>
<div class="mb-5">
	<x-label for="name" :value="__('Name')" />
	<x-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name') ?? $playlist->name" required />
	@error('name')
	<div class="mt-1 text-xs text-rose-600">{{ $message }}</div>
	@enderror
</div>
<div class="mb-5">
	<x-label for="price" :value="__('Price')" />
	<x-input id="price" class="block w-full mt-1" type="text" name="price" :value="old('price') ?? $playlist->price" required />
	@error('price')
	<div class="mt-1 text-xs text-rose-600">{{ $message }}</div>
	@enderror
</div>
<div class="mb-5">
	<x-label for="description" :value="__('Description')" />
	<x-textarea id="description" class="block w-full mt-1" type="text" name="description" required>{{ old('description') ?? $playlist->description }}</x-textarea>
	@error('description')
	<div class="mt-1 text-xs text-rose-600">{{ $message }}</div>
	@enderror
</div>
<div class="mb-5">
	<x-label for="tags" value="" Tags" />
	<select multiple name="tags[]" id="tags" class="w-full text-gray-500 border-gray-200 rounded-md focus:border-indigo-100 focus:ring focus:ring-indigo-100 focus:ring-opacity-50">
		@foreach ($tags as $tag)
		<option {{ $playlist->tags()->find($tag->id) ? 'selected' : '' }} value="{{ $tag->id }}">{{ $tag->name }}</option>
		@endforeach
	</select>
	@error('description')
	<div class="mt-1 text-xs text-rose-600">{{ $message }}</div>
	@enderror
</div>
<div>
	<x-button>{{ $submit }}</x-button>
</div>