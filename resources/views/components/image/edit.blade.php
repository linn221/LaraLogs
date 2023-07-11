@props([
    'uri',
    'caption' => ''
])
<img src="{{ asset(Storage::url($uri))  }}" alt="Image deleted" class="w-25">