@extends('layouts.app')
@section('content')
    <div class=" container">
        <div class="row">
            <div class="col-12">

                <div class=" mb-3">
                    <x-buttons.icon icon="list-task" :hLink="route('page.index')" outline="dark" size="" />
                </div>

                <div>
                    <h4>
                        {{ $log->title }}
                    </h4>
                <hr>
                    <div class="">
                        <span class=" badge bg-success me-2">
                            <a href="{{ route('page.category', $log->category_id) }}"
                                class=" text-decoration-none text-white">
                                {{ $log->category->name }}
                            </a>
                        </span>
                        @foreach ($log->tags as $tag)
                            <x-tag-link :hLink="route('page.tag', $tag->id)" :hText="$tag->name" />
                        @endforeach
                    </div>
                    <div class=" mt-4">
                        {{ $log->content }}
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
    </div>
@endsection

@push('script')
@endpush
