@extends('layouts.app')
@section('content')
    <div class=" container">
        <div class="row">
            <div class="col-12">
                <h3>Log Detail</h3>
                <hr>

                <div class=" mb-3">
                    <x-buttons.icon icon="pencil" :hLink="route('logs.edit', $log->id)" outline="primary" size="" />
                    <x-buttons.icon icon="list-task" :hLink="route('logs.index')" outline="dark" size="" />

                </div>

                <div>
                    <h4>
                        {{ $log->title }}
                    </h4>
                    <div class="">
                        <span class=" badge bg-success me-2">
                            <a href="{{ route('logs.index.category', $log->category_id) }}"
                                class=" text-decoration-none text-white">
                                {{ $log->category->name }}
                            </a>
                        </span>
                        @foreach ($log->tags as $tag)
                            <x-tag-link :id="$tag->id" :name="$tag->name" />
                        @endforeach
                    </div>
                    <div class="">
                        {{ $log->content }}
                    </div>
                </div>

            </div>
            @foreach ($log->images as $image)
                <img src="{{ asset(Storage::url($image->uri)) }}" alt="" width="200">
            @endforeach
        </div>
    </div>
@endsection

@push('script')
@endpush
