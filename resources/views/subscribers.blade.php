@extends('layouts.app')

@section('content')
    <div class="list-group">
        @foreach ($subscribers as $subscriber)
            <div class="list-group-item">
                {{ $subscriber->address }}
            </div>
        @endforeach
    </div>
@endsection
