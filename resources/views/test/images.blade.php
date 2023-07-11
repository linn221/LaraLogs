@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
@foreach ($images as $image)
    <x-image.edit :image="$image" />
@endforeach

    </div>
</div>
@endsection