<div class="flex mb-4 space-x-2 text-lg">
  <div>
    <a href="{{ $link }}">{{ $title }}</a>
  </div>
  <div>&middot;</div>
  <div class="text-gray-400">{{ $slot }}</div>
  @if (isset($subtitle))
  <div>&middot;</div>
  <div class="text-gray-400">{{ $subtitle }}</div>
  @endif
</div>