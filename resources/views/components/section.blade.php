@props([
    'title' => '',
])

<div class="section">
    <h3 class="font-semibold mb-2">{{ $title }}</h3>
    <div class="section-grid">
        {{ $slot }}
    </div>
</div>
