@props([
    'placeholder' => '',
])

<textarea placeholder="{{ $placeholder }}" {{ $attributes->merge(['class' => 'input']) }}>
</textarea>
