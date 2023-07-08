@props([
    'hLink',
    'hText'
])
<a href="{{ $hLink; }}"
{{ $attributes->merge([ 'class' => 'text-decoration-none' ]) }}
>
    {{ $hText; }}
</a>
