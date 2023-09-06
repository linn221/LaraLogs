@extends('layouts.app')
@section('content')
    <div class=" container">
        <div class="row mx-5 px-4">
            <div class="col-12">

                {{-- <div class=" mb-3">
                    <x-buttons.icon icon="list-task" :hLink="route('page.index')" outline="dark" size="" />
                </div> --}}

                <div class=" mt-3">
                    <div class="">
                        <h1 class="">
                            {{ $log->title }}
                        </h1>
                        <div class=" d-flex justify-content-between align-items-center">
                            <div>
                                <span class=" badge bg-success me-2">
                                    <a href="{{ route('page.category', $log->category_id) }}"
                                        class=" text-decoration-none text-white">
                                        {{ $log->category->name }}
                                    </a>
                                </span>
                                @foreach ($log->tags as $tag)
                                    <x-norm-link :hLink="route('page.tag', $tag->id)" :hText="$tag->name" prepend='#' />
                                @endforeach

                                <div class="d-inline-block p-1 pe-4">
                                    <p class=" small mb-0">
                                        <i class=" bi bi-clock"></i>
                                        {{ $log->created_at->diffForHumans() }}
                                        <i class=" bi bi-calendar"></i>
                                        {{ $log->created_at->format('d M') }}
                                    </p>
                                </div>
                            </div>
                            <div>
                                <form action="{{ route('email.follow') }}" method="post"> @csrf
                                    <input type="hidden" name="log-id" value="{{ $log->id }}">
                                    <div class="input-group">
                                        <input type="email" name="email-address" id="subscribe-mail"
                                            class=" form-control @error('email-address') {{ 'is-invalid' }} @enderror"
                                            value="{{ old('email-address', '') }}" placeholder="follow updates">
                                        <button class="btn btn-sm btn-dark">
                                            <i class=" bi bi-envelope"></i> :{{ $log->emails->count() }}
                                        </button>
                                        @error('email-address')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="">
                    <p class="">
                        {{ $log->content }}
                    </p>
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
    </div>
    </div>
@endsection

@push('script')
@endpush
