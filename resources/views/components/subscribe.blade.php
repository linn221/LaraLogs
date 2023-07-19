<form action="{{ route('email.sub') }}" method="post">
    @csrf
    {{-- <label for="subscribe-mail" class=" form-label">
        Enter your Email Address
    </label> --}}
        <input type="email" name="email-address" id="subscribe-mail" class=" form-control @error('email-address') {{ "is-invalid" }} @enderror"
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