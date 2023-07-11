@props([
    'uri',
    'caption' => 'photo.jpg'
])
<img src="{{ asset(Storage::url($uri)) }}" alt="Image deleted" class=" w-25">
@if ($caption)
    <p class="lead">
        {{ $caption }}
    </p>
@endif