@extends('layouts.app')
@section('content')
    <div class=" container">
        <div class="row">
            <div class="col-12">

                <div class=" mb-3">
                    <x-buttons.icon icon="pencil" :hLink="route('logs.edit', $log->id)"/>
                    <x-buttons.icon icon="list-task" :hLink="route('logs.index')"/>
                    <x-buttons.icon icon="eye" :hLink="route('page.log', $log->id)"/>
                </div>

                <div>
                    <h4>
                        {{ $log->title }}
                    </h4>
                <hr>
                    <div class="">
                        <span class=" badge bg-success me-2">
                            <a href="{{ route('logs.index.category', $log->category_id) }}"
                                class=" text-decoration-none text-white">
                                {{ $log->category->name }}
                            </a>
                        </span>
                        @foreach ($log->tags as $tag)
                            <x-norm-link :hLink="route('logs.index.tag', $tag->id)" :hText="$tag->name" prepend='#'/>
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
    </div>
@endsection

@push('script')
@endpush
