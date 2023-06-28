@extends('layouts.app')
@section('content')
    <div class=" container">
        <div class="row">
            <div class="col-12">
                <h3>Logs</h3>
                <hr>

                <div class=" mb-3">
                    <a href="{{ route('dummy') }}" class="btn btn-outline-dark">New</a>
                </div>

                <table class=" table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Control</th>
                            <th>Updated At</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>
                                Log Title
                                <br>
                                <span class=" small text-black-50">
                                    Log Brief
                                    {{-- {{ Str::limit($category->description, 30, '...') }} --}}
                                </span>
                            </td>

                            <td>
                                <div class="btn-group">

                                    <a class=" btn btn-sm btn-outline-dark" href="{{ route('logs.show') }}">
                                        show
                                        <i class=" bi bi-info"></i>
                                    </a>
                                    <a href="{{ route('dummy') }}" class="btn btn-sm btn-outline-dark">
                                        Edit
                                        <i class=" bi bi-pencil"></i>
                                    </a>

                                    <button form="deleteForm" class=" btn btn-sm btn-outline-dark">
                                        Delete
                                        <i class=" bi bi-trash3"></i>
                                    </button>

                                </div>
                                <form id="deleteForm" class=" d-inline-block" action="{{ route('dummy') }}" method="post">
                                    @method('delete')
                                    @csrf

                                </form>
                            </td>
                            <td>
                                <p class=" small mb-0">
                                    <i class=" bi bi-clock"></i>

                                    5:50
                                    {{-- {{ $category->updated_at->format('h:i a') }} --}}
                                </p>
                                <p class=" small mb-0">
                                    <i class=" bi bi-calendar"></i>
                                    12 2 2012
                                    {{-- {{ $category->updated_at->format('d M Y') }} --}}
                                </p>

                            </td>
                            <td>
                                <p class=" small mb-0">
                                    <i class=" bi bi-clock"></i>
                                    5:50
                                </p>
                                <p class=" small mb-0">
                                    <i class=" bi bi-calendar"></i>
                                    12 2 2012
                                </p>

                            </td>
                        </tr>
                        {{-- <tr>
                                <td colspan="6" class=" text-center">
                                    <p>
                                        There is no record
                                    </p>
                                    <a class=" btn btn-sm btn-primary" href="{{ route('dummy') }}">Create
                                        Category</a>
                                </td>
                            </tr> --}}
                    </tbody>
                </table>
                <div class="">
                    {{-- {{ $categories->onEachSide(1)->links() }} --}}
                </div>

            </div>
        </div>
    </div>
@endsection
