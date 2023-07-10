@extends('layouts.app')

@section('content')

@if ($errors->any())
{{ print_r($errors->all()); }}
@endif

<form action="{{ route('upload-image') }}" method="post" enctype="multipart/form-data">
    @csrf
    @foreach (App\Models\Log::paginate(10)->pluck('id') as $log_id)
        <input type="radio" name="log-id" value="{{ $log_id }}" id="{{ "rb-$log_id" }}">
        <label for="{{ "rb-$log_id" }}">
            {{ $log_id }}
        </label>
        <br>
    @endforeach
    <input type="file" name="images[]" id="" multiple>
    <button>
        Upload
    </button>
</form>
    
@endsection