<form action="{{ route('email.sub') }}" method="post">
    @csrf
    <div class="input-group">
        <input type="email" name="email-address" id="subscribe-mail"
            class=" form-control @error('email-address') {{ 'is-invalid' }} @enderror"
            value="{{ old('email-address', '') }}" placeholder="your email">

        <button class="btn btn-sm btn-danger">
            Subscribe
        </button>
        @error('email-address')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</form>


<div class="list-group mt-3">
    <div class=" list-group-item list-group-item-secondary">
        Categories
    </div>
    @foreach (\App\Models\Category::withCount('logs')->get() as $category)
        <div class="list-group-item">
            <a href="{{ route('page.category', $category->id) }}" class=" text-decoration-none text-dark">
                <div class="d-flex justify-content-between">
                    <span>
                        {{ $category->name }}
                    </span>
                    <span class="">

                        {{ $category->logs_count }}
                    </span>
                </div>
            </a>
        </div>
    @endforeach
</div>

<div class="list-group mt-3">
    <div class="list-group-item list-group-item-secondary">
        Tags
    </div>
    <div class="list-group-item">
        {{-- @feature change font size according to number of posts --}}
        @foreach (\App\Models\Tag::all() as $tag)
            <x-norm-link :hLink="route('page.tag', $tag->id)" :hText="$tag->name" prepend='#' class=" fs-5"/>
        @endforeach
    </div>
</div>

<div class="list-group mt-3">
    <div class=" list-group-item list-group-item-success">
        Latest Posts
        {{-- <i class=" bi bi-pin-angle">
        </i> --}}
    </div>

    @forelse (\App\Models\Log::orderBy('updated_at')->limit(5)->get() as $recent)
        <a href="{{ route('page.log', $recent->id) }}" class=" text-decoration-none">
            <div class=" card mb-2">
                <div class=" card-body">
                    <h4 class="card-tite">
                        {{ $recent->title }}
                    </h4>
                    <div class=" card-text">
                        {{ Str::limit($recent->content, 70) }}
                    </div>
                    <div class="card-text text-black-50">
                        <small>
                            <i class=" bi bi-clock"></i>
                            {{ $log->created_at->diffForHumans() }}
                        </small>
                    </div>
                </div>
            </div>
        </a>
    @empty
        Empty
    @endforelse
</div>
