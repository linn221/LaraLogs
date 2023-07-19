@props([
    'hLink',
    'hText',
    'prepend' => ''
])
<a href="{{ $hLink; }}"
{{ $attributes->merge([ 'class' => 'text-decoration-none' ]) }}
>
    {{ $prepend . $hText; }}
</a>