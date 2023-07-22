@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mb-3">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>




            <div class="col-md-8 mb-3">
                <div class="card">
                    <div class="card-header">Manage Categories</div>
                    <div class="card-body">
                        <div class="list-group">
                            <a href="{{ route('categories.index') }}" class=" list-group-item list-group-item-info">
                                View Categories
                            </a>
                            <a href="{{ route('categories.create') }}" class=" list-group-item list-group-item-warning">
                                Create Categories
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8 mb-3">
                <div class="card">
                    <div class="card-header">Manage Tags</div>
                    <div class="card-body">
                        <div class="list-group">

                            <a href="{{ route('tags.index') }}" class=" list-group-item list-group-item-info">
                                View Tags
                            </a>
                            <a href="{{ route('tags.create') }}" class=" list-group-item list-group-item-warning">
                                Create Tags
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8 mb-3">
                <div class="card">
                    <div class="card-header">Manage Subscribers</div>
                    <div class="card-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
