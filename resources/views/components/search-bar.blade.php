@props([])
<div class=" search-form mb-3">
    <form action="" class="">
        <div class="input-group">
            {{ $slot }}
            <input type="text" class=" form-control" name="q" value="{{ request()->q }}">
            <button class=" btn btn-sm btn-dark">
                <i class=" bi bi-search"></i>
            </button>
        </div>
    </form>
</div>
