@props([
    'hLink',
    'hText' => $hLink
])


<a href="{{ $hLink }}">
    {!! $hText !!}
</a>