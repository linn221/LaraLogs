@props([
    'id', 'name'
])
<a href="{{ route('logs.index.tag', $id) }}" class=" text-decoration-none">
    {{ "#$name" }}
</a>
