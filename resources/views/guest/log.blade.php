@extends('layouts.app')
@section('content')
    {{ $errors }}
    <div class=" container">
        <div class="row">
            <div class="col-12">

                <div class=" mb-3">
                    <x-buttons.icon icon="list-task" :hLink="route('page.index')" outline="dark" size="" />
                </div>

                <div>
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <h4>
                            {{ $log->title }}
                        </h4>
                        <div class="">
                            <span class=" badge bg-success me-2">
                                <a href="{{ route('page.category', $log->category_id) }}"
                                    class=" text-decoration-none text-white">
                                    {{ $log->category->name }}
                                </a>
                            </span>
                            @foreach ($log->tags as $tag)
                                <x-norm-link :hLink="route('page.tag', $tag->id)" :hText="$tag->name" prepend='#' />
                            @endforeach
                        </div>
                    </div>
                    <form action="{{ route('email.follow') }}" method="post">
                        @csrf
                        <input type="hidden" name="log-id" value="{{ $log->id }}">
                        {{-- <label for="subscribe-mail" class=" form-label">
        Enter your Email Address
    </label> --}}

                        <div class="input-group w-25 mt-4">
                            <input type="email" name="email-address" id="subscribe-mail"
                                class=" form-control @error('email-address') {{ 'is-invalid' }} @enderror"
                                value="{{ old('email-address', '') }}" placeholder="your email">
                            <button class="btn btn-sm btn-dark">
                                <i class=" bi bi-envelope"></i> WATCH
                            </button>
                            @error('email-address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                    </form>
                </div>
                <hr>
                <div class=" border border-success d-inline-block p-1 pe-4 mb-3">
                    <p class=" small mb-0">
                        <i class=" bi bi-clock"></i>

                        {{ $log->created_at->diffForHumans() }}
                    </p>
                    <p class=" small mb-0">
                        <i class=" bi bi-calendar"></i>
                        {{ $log->created_at->format('d M Y') }}
                    </p>
                </div>
                <div class=" mb-3 border border-dark rounded-2 p-3">
                    <p class="">
                        {{ $log->content }}
                    </p>
                </div>
            </div>

        </div>
        <hr>
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
    @auth
        <div class="h4 mt-3">
            Subscribers
        </div>
        <div class="list-group w-50">
            @foreach ($log->emails as $email)
                <div class=" list-group-item">
                    {{ $email->address }}
                </div>
            @endforeach
        </div>
    @endauth
    </div>
@endsection

@push('script')
@endpush
