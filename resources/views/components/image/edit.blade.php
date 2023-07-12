@props(['image'])
<form action="{{ route('caption-image', $image->id) }}" method="post"
    id="{{ "image-caption-form-$image->id" }}">
    @csrf
    @method('patch')
</form>
<div class="row">
    <div class="col-6">
        <img src="{{ asset(Storage::url($image->uri)) }}" alt="Image deleted" class="img-fluid">

    </div>
    <div class="col-6 my-auto">
        <div class="input-group">
            <input type="text" name="caption" id="" value="{{ $image->caption }}"
                class=" d-inline-block form-control" form="{{ "image-caption-form-$image->id" }}" name="caption">
            <button class=" btn btn-sm btn-outline-info" form="{{ "image-caption-form-$image->id" }}">
                rename
            </button>
                {{-- <x-buttons.delete :action="route('delete-image', $image->id)" :id="$image->id" /> --}}
        </div>
    </div>

</div>
