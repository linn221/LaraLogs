@extends('layouts.app')
@section('content')
    <div class=" container-sm">
        <div class="row g-2">
            <div class="col-10">
                <div class=" mb-3">
                    <div>
                        SEARCH BAR
                    </div>
                    <h4>
                        BANNER
                    </h4>
                </div>
                <table class=" table table-danger">
                </table>
            </div>
            <div class="col-2">
                @include('layouts.sidebar')
            </div>
        </div>
    </div>
@endsection
