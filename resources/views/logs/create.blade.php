@extends('layouts.app')
@section('content')
    {{-- {{ $errors }} --}}
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
                    value="{{ old('title') }}" name="title">
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
                <label class=" form-label" for="">Select Category</label>

                <select form="createLogForm" class=" form-select @error('cat') is-invalid @enderror " name="cat">
                    @foreach (App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach

                </select>
                @error('cat')
                    <div class=" invalid-feedback">{{ $message }}</div>
                @enderror
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
