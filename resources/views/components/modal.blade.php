<div {{ $attributes->merge(['class' => 'absolute font-normal bg-black bg-opacity-30 backdrop-blur w-full h-full top-0 left-0 flex justify-center items-center']) }}>
  <div class="bg-white rounded-lg w-4/12">
    <div class="flex justify-between border-b px-5 py-3 font-semibold">
      <div>{{ $title }}</div>
      <button class="focus:outline-none" @click="{{ $state}} = false">
        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>
    <div class="p-5 text-left">
      {{ $slot }}
    </div>
  </div>
</div>
