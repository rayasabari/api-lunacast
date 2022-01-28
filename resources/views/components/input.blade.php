@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md text-gray-500 border-gray-200 focus:border-indigo-100 focus:ring focus:ring-indigo-100 focus:ring-opacity-50']) !!}>
