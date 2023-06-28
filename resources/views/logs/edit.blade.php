@extends('layouts.app')
@section('content')
    <div class=" container-sm">
        <div class="row">
            <h3>Add New Log</h3>
            <hr>
            <form action="{{ route('dummy') }}" id="createLogForm" method="post">
                @csrf
            </form>

            <div class="mb-3">
                <label class=" form-label" for="">Title</label>
                <input form="createLogForm" type="text" class=" form-control" {{-- <input form="createLogForm" type="text" class=" form-control @error('title') is-invalid @enderror" --}}
                    value="{{ old('title') }}" name="title">
                {{-- @error('title')
                        <div class=" invalid-feedback">{{ $message }}</div>
                    @enderror --}}
            </div>

            <div class="mb-3">
                <label class=" form-label" for="">Body</label>
                <textarea form="createLogForm" name="body" class=" form-control " rows="10">{{ old('body') }}</textarea>
            </div>
            <div class="mb-3">
                <label class=" form-label" for="">Select Category</label>
                <select form="createLogForm" class=" form-select " name="category">

                    {{-- @foreach (App\Models\Category::all() as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->title }}
                            </option>
                        @endforeach --}}

                </select>
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
