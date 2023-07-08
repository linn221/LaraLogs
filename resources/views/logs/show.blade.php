@extends('layouts.app')
@section('content')
    <div class=" container">
        <div class="row">
            <div class="col-12">
                <h3>Log Detail</h3>
                <hr>

                <div class=" mb-3">
                    <a href="{{ route('logs.edit', $log->id) }}" class="btn btn-outline-primary">Edit</a>
                    <a href="{{ route('logs.create') }}" class="btn btn-outline-success">New</a>
                    <a href="{{ route('logs.index') }}" class="btn btn-outline-dark">All Logs</a>
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
        </div>
    </div>
@endsection

@push('script')
@endpush
