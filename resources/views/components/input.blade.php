{{-- @props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}> --}}

@props([
    'type' => 'text',
    'placeholder' => '',
])

<input type="{{ $type }}" placeholder="{{ $placeholder }}" {{ $attributes->merge(['class' => 'input']) }}>
