@props(['disabled' => false])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-gray-100 focus:border-indigo-100 focus:ring focus:ring-indigo-100 focus:ring-opacity-50']) !!}></textarea>
