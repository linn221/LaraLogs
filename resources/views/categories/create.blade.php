@extends('layouts.app')

@section('content')
    <div class=" container">
        <div class="row">
            <div class="col-12">
                <h3>Create New Category</h3>
                <hr>
                <form action="{{ route('categories.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label class=" form-label" for="">Category Name</label>
                        <input type="text" class=" form-control @error('name') is-invalid @enderror"
                            value="{{ old('name') }}" name="name">
                        @error('name')
                            <div class=" invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button class=" btn btn-primary">Save Category</button>
                </form>
            </div>
        </div>
    </div>
@endsection