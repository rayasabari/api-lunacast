@props(['disabled' => false])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md text-gray-500 shadow-sm border-gray-200 focus:border-indigo-100 focus:ring focus:ring-indigo-100 focus:ring-opacity-50']) !!}>
{{ $slot }}
</textarea>
