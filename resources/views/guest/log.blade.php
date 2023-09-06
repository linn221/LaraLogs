@extends('layouts.app')
@section('content')
    <div class=" container">
        {{-- right column --}}
        <div class="" id="head">
            <h1 class=" text-center my-5">
                {{ $log->title }}
            </h1>
            <div class="d-flex justify-content-between">
                {{-- date --}}
                <div class="">
                    <p class=" small mb-0 d-inline">
                        <i class=" bi bi-calendar"></i>
                        {{ $log->created_at->format('d M') }}
                    </p>
                    |
                    <a href="{{ route('page.category', $log->category_id) }}" class=" text-decoration-none text-dark fw-bold">
                        {{ $log->category->name }}
                    </a>
                </div>

                <div class="">
                    <form action="{{ route('email.follow') }}" method="post"> @csrf
                        <input type="hidden" name="log-id" value="{{ $log->id }}">
                        <div class="input-group">
                            <input type="email" name="email-address" id="subscribe-mail"
                                class=" form-control @error('email-address') {{ 'is-invalid' }} @enderror"
                                value="{{ old('email-address', '') }}" placeholder="follow updates">
                            <button class="btn btn-sm btn-outline-dark">
                                <i class=" bi bi-envelope"></i> :{{ $log->emails->count() }}
                            </button>
                            @error('email-address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                    </form>
                </div>
            </div>
        </div>
        <hr>
        <p class="" id="content">
            {{ $log->content }}
        </p>
        <hr>
        <div id="images">

            @if (!empty($log->images->toArray()))
                <div class=" mt-2">
                    <h3 class=" mb-3">Images:</h3>
                    @foreach ($log->images as $image)
                        <x-image.show :image="$image" />
                        {{-- <img src="{{ asset(Storage::url($image->uri)) }}" alt="" width="200"> --}}
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection

@push('script')
@endpush
