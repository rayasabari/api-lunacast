@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' => 'form-control block w-full px-2
py-1.5
text-md
font-normal
text-gray-400
bg-white bg-clip-padding
border border-solid border-gray-100
rounded
transition
ease-in-out
m-0
focus:text-gray-700 focus:bg-white focus:border-blue-100 focus:outline-none',
]) !!}>
