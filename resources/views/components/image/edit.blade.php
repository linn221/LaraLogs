@props(['image'])
<form action="{{ route('caption-image', $image->id) }}" method="post"
    id="{{ "image-caption-form-$image->id" }}">
    @csrf
    @method('patch')
</form>
<div class="container-fluid mb-3">

<div class="row">
    <div class="col-6">
        <img src="{{ asset(Storage::url($image->uri)) }}" alt="Image deleted" class="img-fluid">
    </div>
    <br>
    <div class="col-6">
        <div class="input-group">
            <input type="text" name="caption" id="" value="{{ $image->caption }}"
            placeholder="image caption"
                class=" d-inline-block form-control" form="{{ "image-caption-form-$image->id" }}" name="caption">
                @if ($image->caption)
            <button class=" btn btn-sm btn-outline-primary" form="{{ "image-caption-form-$image->id" }}">
                rename
            </button>
            @else
            <button class=" btn btn-sm btn-outline-success" form="{{ "image-caption-form-$image->id" }}">
                caption
            </button>

                @endif
            <x-buttons.delete :action="route('delete-image', $image->id)" :id="$image->id" />
        </div>
    </div>

</div>

</div>