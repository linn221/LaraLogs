@props([])
<div class=" search-form mb-3 w-25 ms-auto">
    <form action="" class="">
        <div class="input-group">
            <a href="{{ route('logs.index', ['trash-bin']) }}" class=" btn">
                <i class=" bi bi-trash"> </i>
            </a>
            <button class=" btn btn-sm">
                <i class=" bi bi-search"></i>
            </button>
            <input type="text" class=" form-control" name="q" value="{{ request()->q }}">
        </div>
    </form>
</div>
