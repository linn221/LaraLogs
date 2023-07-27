<div class=" search-form mb-3">
    <form action="{{ request()->fullUrl() }}" class="">
        <div class="input-group">
            <input type="text" class=" form-control" name="q" value="{{ request()->q }}">
            <button class=" btn btn-sm btn-dark">
                <i class=" bi bi-search"></i>
            </button>
        </div>
    </form>
</div>
<form action="{{ route('email.sub') }}" method="post">
    @csrf
    {{-- <label for="subscribe-mail" class=" form-label">
Enter your Email Address
</label> --}}
    <input type="email" name="email-address" id="subscribe-mail"
        class=" form-control @error('email-address') {{ 'is-invalid' }} @enderror"
        value="{{ old('email-address', '') }}" placeholder="your email">

    <button class="btn btn-sm btn-danger w-100">
        Subscribe
    </button>
    @error('email-address')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</form>


    <div class="list-group mt-3">
        <div class=" list-group-item list-group-item-success">
            Categories
        </div>
        @foreach (\App\Models\Category::all() as $category)
            <div class="list-group-item">
                <x-norm-link :hText="$category->name" :hLink="route('page.category', $category->id)" class=" text-dark"/>
                {{-- {{ $category->name }} --}}
            </div>
        @endforeach
    </div>
