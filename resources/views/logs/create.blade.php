@extends('layouts.app')
{{-- {{ $errors }} --}}
@section('content')
    <div class=" container-sm">
        <div class="row">
            <h3>Add New Log</h3>
            <hr>
            <form action="{{ route('logs.store') }}" id="createLogForm" method="post">
                @csrf
            </form>

            <div class="mb-3">
                <label class=" form-label" for="">Title</label>
                <input form="createLogForm" type="text" class=" form-control @error('title') is-invalid @enderror"
                    value="{{ old('title') }}" name="title" autofocus>
                @error('title')
                    <div class=" invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class=" form-label" for="">Content</label>
                <textarea form="createLogForm" name="content" class=" form-control @error('content') is-invalid @enderror "
                    rows="10">{{ old('content') }}</textarea>
                @error('content')
                    <div class=" invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">

                @foreach (App\Models\Category::all() as $category)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="{{ "cat-$category->id" }}" name='cat'
                            form="createLogForm" value="{{ $category->id }}"
                            {{ old('cat') == $category->id ? 'checked' : '' }}>
                        <label class="form-check-label" for="{{ "cat-$category->id" }}">
                            {{ $category->name }}
                        </label>
                    </div>
                @endforeach
            </div>
            {{-- radio to fail the validation --}}
            {{-- <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="fail" name='cat' form="createLogForm"
                    value="fail">
                <label class="form-check-label" for="fail">
                    fail
                </label>
            </div> --}}
            {{-- <option value="{{ $category->id }}" {{ old('cat') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option> --}}

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
