@props([])
@php
    $toggle_trash_bin = request()->has('trash-bin') ? route('logs.index') : route('logs.index', ['trash-bin']);
@endphp
<div class=" search-form mb-3 w-25 ms-auto">
    <form action="" class="">
        <div class="input-group">
            @auth
                <a href="{{ $toggle_trash_bin }}" class=" btn">
                    <i class="bi {{ request()->has('trash-bin') ? 'bi-trash3' : 'bi-trash3-fill' }}"></i>
                </a>

            @endauth
            <button class=" btn btn-sm">
                <i class=" bi bi-search"></i>
            </button>
            <input type="text" class=" form-control" name="q" value="{{ request()->q }}">
        </div>
    </form>
</div>
