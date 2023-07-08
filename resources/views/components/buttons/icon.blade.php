@props([
    'hLink' => url('/'),
    'icon' => 'info'
])
<a class=" btn btn-sm btn-outline-dark" href="{{ $hLink; }}">
    <i class=" bi bi-{{ $icon; }}"></i>
</a>