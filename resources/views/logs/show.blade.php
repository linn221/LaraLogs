@extends('layouts.app')
@section('content')
    <div class=" container">
        <div class="row">
            <div class="col-12">
                <h3>Log Detail</h3>
                <hr>

                <div class=" mb-3">
                    <a href="{{ route('dummy') }}" class="btn btn-outline-dark">New</a>
                    <a href="{{ route('dummy') }}" class="btn btn-outline-dark">All Logs</a>
                </div>

                <div>
                    <h4>
                        $log_title
                    </h4>
                    <div class="">
                        <span class=" badge bg-black">
                            $category
                        </span>
                    </div>
                    <div class="">
                        $body
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('script')
@endpush
