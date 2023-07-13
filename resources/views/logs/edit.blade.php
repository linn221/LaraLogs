@extends('layouts.app')
@section('content')
    {{-- {{ $errors }} --}}
    <div class=" container-sm">
        {{-- showing uploaded images --}}
        @foreach ($log->images as $image)
            <x-image.edit :image="$image" />
            <br>
            {{-- <x-image.edit :image="$image" /> --}}
        @endforeach
        {{-- <button>trash</button> --}}
        <input form="imageForm" type="file" name="images[]" class=" form-control form-control-file mb-5" multiple
            onchange="document.querySelector('#imageForm').submit()">
        <div class="row">
            <h3>Edit Log</h3>
            <hr>
            <form action="{{ route('logs.update', $log->id) }}" id="createLogForm" method="post">
                @csrf
                @method('put')
            </form>

            <div class="mb-3">
                <label class=" form-label" for="">Title</label>
                <input form="createLogForm" type="text" class=" form-control @error('title') is-invalid @enderror"
                    value="{{ old('title', $log->title) }}" name="title">
                @error('title')
                    <div class=" invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class=" form-label" for="">Content</label>
                <textarea form="createLogForm" name="content" class=" form-control @error('content') is-invalid @enderror "
                    rows="10">{{ old('content', $log->content) }}</textarea>
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                @foreach (App\Models\Category::all() as $category)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="{{ "cat-$category->id" }}" name='cat'
                            form="createLogForm" value="{{ $category->id }}"
                            {{ old('cat', $log->category_id) == $category->id ? 'checked' : '' }}>
                        <label class="form-check-label" for="{{ "cat-$category->id" }}">
                            {{ $category->name }}
                        </label>
                    </div>
                @endforeach
            </div>

            <div class="mb-3">
                <label class=" form-label" for="">Tags:</label>
                <br>
                {{-- {{ dd($log->tags->pluck('id')) }} --}}
                @foreach (App\Models\Tag::all() as $tag)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="{{ "tag-$tag->id" }}" form="createLogForm"
                            name="tags[]" value="{{ $tag->id }}"
                            {{ in_array($tag->id, old('tags', $log->tags->pluck('id')->toArray())) ? 'checked' : '' }}>
                        <label class="form-check-label" for="{{ "tag-$tag->id" }}">
                            {{ $tag->name }}
                        </label>
                    </div>
                @endforeach
            </div>

            <div class="mb-3">
                <button form="createLogForm" class=" w-100 d-block btn btn-primary">Save Log</button>
            </div>
        </div>
    </div>
@endsection

@push('script')
    {{-- @vite(["resources/js/single-upload.js"]) --}}
@endpush
