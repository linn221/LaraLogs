{{-- yellow --}}
@extends('layouts.app')

@section('content')
    <div class=" container">
        <div class="row">
            <div class="col-12">
                <h3>Edit Tag</h3>
                <hr>
                <form action="{{ route('tags.update', $tag->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label class=" form-label" for="">Tag Name</label>
                        <input type="text" class=" form-control @error('name') is-invalid @enderror"
                            value="{{ old('name', $tag->name) }}" name="name" autofocus>
                        @error('name')
                            <div class=" invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button class=" btn btn-primary">Update Tag Name</button>
                </form>
            </div>
        </div>
    </div>
@endsection