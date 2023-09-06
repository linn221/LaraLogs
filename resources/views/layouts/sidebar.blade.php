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
    <div class=" list-group-item list-group-item-success">
        Categories
    </div>
    @foreach (\App\Models\Category::all() as $category)
        <div class="list-group-item">
            <x-norm-link :hText="$category->name" :hLink="route('page.category', $category->id)" class=" text-dark" />
            {{-- {{ $category->name }} --}}
        </div>
    @endforeach
</div>

<div class="list-group mt-3">
    <div class=" list-group-item list-group-item-success">
        Recent Posts
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
