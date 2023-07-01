@extends('layouts.app')
@section('content')
    <div class=" container">
        <div class="row">
            <div class="col-12">
                <h3>Log Detail</h3>
                <hr>

                <div class=" mb-3">
                    <a href="{{ route('logs.create') }}" class="btn btn-outline-dark">New</a>
                    <a href="{{ route('logs.index') }}" class="btn btn-outline-dark">All Logs</a>
                </div>

                <div>
                    <h4>
                        {{ $log->title }}
                    </h4>
                    <div class="">
                        <span class=" badge bg-black">
                            {{ $log->category->name }}
                        </span>
                    </div>
                    <div class="">
                        {{ $log->content }}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('script')
@endpush
