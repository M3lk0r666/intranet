@php
    $categories = $getRecord()->catsvideos;
@endphp

@if ($categories === null || $categories->isEmpty())
    <span class="text-muted">Sin categorías</span>
@else
    @foreach ($categories as $category)
        <span class="badge badge-primary mr-1 mb-1">{{ $category->name }}</span>
    @endforeach
@endif
