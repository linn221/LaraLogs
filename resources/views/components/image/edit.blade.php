@props(['image', 'caption' => null])
<form action="{{ route('caption-image', $image->id) }}" method="post" id="imageCaptionForm">
    @csrf
    @method('patch')
</form>
<div class="row">
    <div class="col-6">
        <img src="{{ asset(Storage::url($image->uri)) }}" alt="Image deleted" class="img-fluid">

    </div>
    <div class="col-6 my-auto">
        <div class="input-group">
            <input type="text" name="caption" id="" value="{{ $caption ?? $image->id }}"
                class=" d-inline-block form-control" form="{{ "image-caption-form-$image->id" }}">
            <button class=" btn btn-sm btn-outline-info" form="{{ "image-caption-form-$image->id" }}">
                RENAME
            </button>
            <x-buttons.delete :action="route('delete-image', $image->id)" :id="$image->id" />
        </div>
    </div>

</div>
