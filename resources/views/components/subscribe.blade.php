<div class="d-flex">

<form action="{{ route('email.sub') }}" method="post">
    @csrf
    <label for="subscribe-mail" class=" form-label">
        Enter your Email Address
    </label>
    <div class="input-group">
        <input type="email" name="email-address" id="subscribe-mail" class=" form-control @error('email-address') {{ "is-invalid" }} @enderror"
        value="{{ old('email-address', '') }}">

        <button class=" btn btn-danger">
            Subscribe
        </button>


        @error('email-address')
            
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror

    </div>

</form>
</div>