@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
'class' => 'block w-full mt-1
text-md
font-normal
text-gray-400
bg-white bg-clip-padding
rounded
transition
ease-in-out
m-0
focus:text-gray-700 focus:bg-white focus:border-blue-100 focus:outline-none',
]) !!}>