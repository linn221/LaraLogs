@props([
    'hLink',
    'icon',
    'outline' => 'dark',
    'size' => 'sm'
])
@php
    $default_attributes = [
        'class' => " btn btn-$size btn-outline-$outline"
    ];
@endphp
<a
href="{{ $hLink; }}"
{{ $attributes->merge($default_attributes) }}>
    <i class=" bi bi-{{ $icon; }}"></i>
</a>