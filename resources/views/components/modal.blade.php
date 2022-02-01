<div {{ $attributes->merge(['class' => 'absolute font-normal bg-black bg-opacity-30 backdrop-blur w-full h-full top-0 left-0 flex justify-center items-center z-50']) }}>
  <div class="w-4/12 bg-white rounded-lg">
    <div class="flex justify-between px-5 py-3 font-semibold border-b">
      <div>{{ $title }}</div>
      <button class="focus:outline-none" @click="{{ $state}} = false">
        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>
    <div class="p-5 text-left">
      {{ $slot }}
    </div>
  </div>
</div>
