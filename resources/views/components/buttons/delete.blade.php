@props([
    'action',
    'id'
])
<form id="{{ "delete-form-$id" }}" class=" d-inline-block" action="{{ $action }}" method="post">
    @method('delete')
    @csrf
</form>
@php
    
$default = [
    "class" =>" btn btn-sm btn-outline-dark"
];
@endphp
<button form="{{ "delete-form-$id" }}" {{ $attributes->merge($default) }}>
    <i class=" bi bi-trash3"></i>
</button>
