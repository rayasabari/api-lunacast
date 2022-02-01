@csrf
<div class="mb-5">
	<x-label for="name" :value="__('Name')" />
	<x-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name') ?? $tag->name" required />
	@error('name')
	<div class="mt-1 text-xs text-rose-600">{{ $message }}</div>
	@enderror
</div>
<div>
	<x-button>{{ $submit }}</x-button>
</div>