{{-- yellow --}}
@extends('layouts.app')

@section('content')
    <div class=" container">
        <div class="row">
            <div class="col-12">
                <h3>Edit Category</h3>
                <hr>
                <form action="{{ route('categories.update', $category->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label class=" form-label" for="">Category Name</label>
                        <input type="text" class=" form-control @error('name') is-invalid @enderror"
                            value="{{ old('name', $category->name) }}" name="name">
                        @error('name')
                            <div class=" invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button class=" btn btn-primary">Update Category</button>
                </form>
            </div>
        </div>
    </div>
@endsection