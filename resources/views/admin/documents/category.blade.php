@php
    $icon = $category->icon ?? 'las la-folder';
    $name = $category->name ?? ucfirst($value);
    $color = $category->color ?? '#6c757d';
@endphp

<div class="inline-flex items-center px-3 py-1.5 rounded-full text-xs font-medium"
    style="background-color: {{ $color }}20; color: {{ $color }}; border: 1px solid {{ $color }}30;">
    <i class="{{ $icon }} mr-1.5"></i>
    {{ $name }}
</div>
