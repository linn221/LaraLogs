@extends('layouts.app')
@section('content')
    <div class=" container">
        <div class="row">
            <div class="col-12">
                <h3>Logs</h3>
                <hr>

                <div class=" mb-3">
                    <a href="{{ route('logs.create') }}" class="btn btn-outline-dark">New</a>
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
                        @forelse ($logs as $log)
                            <tr>
                                <td>{{ $log->id }}</td>
                                <td>
                                    {{ $log->title }}
                                    <br>
                                    <span class=" small text-black-50">
                                        {{ Str::limit($log->content, 30, '...') }}
                                        {{-- {{ Str::limit($category->description, 30, '...') }} --}}
                                    </span>
                                </td>

                                <td>
                                    <div class="btn-group">

                                        <a class=" btn btn-sm btn-outline-dark" href="{{ route('logs.show', $log->id) }}">
                                            show
                                            <i class=" bi bi-info"></i>
                                        </a>
                                        <a href="{{ route('logs.edit', $log->id) }}" class="btn btn-sm btn-outline-dark">
                                            Edit
                                            <i class=" bi bi-pencil"></i>
                                        </a>

                                        <button form="deleteForm" class=" btn btn-sm btn-outline-dark">
                                            Delete
                                            <i class=" bi bi-trash3"></i>
                                        </button>

                                    </div>
                                    <form id="deleteForm" class=" d-inline-block"
                                        action="{{ route('logs.destroy', $log->id) }}" method="post">
                                        @method('delete')
                                        @csrf

                                    </form>
                                </td>
                                <td>
                                    <p class=" small mb-0">
                                        <i class=" bi bi-clock"></i>

                                        {{ $log->updated_at->format('h:i a') }}
                                    </p>
                                    <p class=" small mb-0">
                                        <i class=" bi bi-calendar"></i>
                                        {{ $log->updated_at->format('d M Y') }}
                                    </p>

                                </td>
                                <td>
                                    <p class=" small mb-0">
                                        <i class=" bi bi-clock"></i>

                                        {{ $log->created_at->format('h:i a') }}
                                    </p>
                                    <p class=" small mb-0">
                                        <i class=" bi bi-calendar"></i>
                                        {{ $log->created_at->format('d M Y') }}
                                    </p>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class=" text-center">
                                    <p>
                                        There is no record
                                    </p>
                                    <a class=" btn btn-sm btn-primary" href="{{ route('logs.create') }}">New Log</a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="">
                    {{-- {{ $categories->onEachSide(1)->links() }} --}}
                </div>

            </div>
        </div>
    </div>
@endsection
