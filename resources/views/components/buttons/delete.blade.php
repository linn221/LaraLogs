@props([
    'action',
    'id'
])
<form id="{{ "delete-form-$id" }}" class=" d-inline-block" action="{{ $action }}" method="post">
    @method('delete')
    @csrf
</form>
<button form="{{ "delete-form-$id" }}" class=" btn btn-sm btn-outline-dark">
    <i class=" bi bi-trash3"></i>
</button>
