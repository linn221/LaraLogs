@props([
    'action'
])
<button form="deleteForm" class=" btn btn-sm btn-outline-dark">
    <i class=" bi bi-trash3"></i>
</button>
<form id="deleteForm" class=" d-inline-block" action="{{ $action }}" method="post">
    @method('delete')
    @csrf
</form>
