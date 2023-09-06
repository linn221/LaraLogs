@props([
    'image'
])
<img src="{{ asset(Storage::url($image->uri)) }}" alt="Image deleted" class=" d-block w-25">
@if ($image->caption)
    <p class="lead">
        {{ $image->caption }}
    </p>
@endif