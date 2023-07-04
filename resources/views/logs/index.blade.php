@extends('layouts.app')
@section('content')
    <div class=" container">
        <div class="row">
            <div class="col-12">
                <h3>Logs</h3>
                <hr>


                <div class=" mb-3">
                    <a href="{{ route('logs.create') }}" class="btn btn-outline-primary">New</a>
                </div>
                <div class=" search-form mb-3 w-25">
                    <form action="" class="">
                        <div class="input-group">
                            <input type="text" class=" form-control" name="q" value="{{ request()->q }}">
                            <button class=" btn btn-dark">
                                <i class=" bi bi-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="">
                    {{ $logs->onEachSide(1)->links() }}
                </div>

                <table class=" table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Tags</th>
                            <th>Control</th>
                            <th>Updated At</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($logs as $log)
                            <tr>
                                <td>
                                    <a href="{{ route('logs.show', $log->id) }}" class="">
                                        {{ $log->id }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('logs.edit', $log->id) }}" class=" text-decoration-none text-dark ">
                                        {{ $log->title }}
                                    </a>
                                    <br>
                                    <span class=" small text-black-50">
                                        {{ Str::limit($log->content, 30, '...') }}
                                        {{-- {{ Str::limit($category->description, 30, '...') }} --}}
                                    </span>
                                </td>

                                <td>
                                    <a href="{{ route('logs.index', ['cat' => $log->category_id]) }}"
                                        class=" text-decoration-none text-dark ">
                                        {{ $log->category->name }}
                                    </a>
                                </td>

                                <td>
                                    {{-- copy & paste proudly from show view --}}
                                    @foreach ($log->tags->pluck('name')->toArray() as $tag_name)
                                        <a href="#" class=" text-decoration-none">
                                            {{ "#$tag_name" }}
                                        </a>
                                    @endforeach
                                </td>
                                <td>
                                    <div class="btn-group">

                                        <a class=" btn btn-sm btn-outline-dark" href="{{ route('logs.show', $log->id) }}">
                                            <i class=" bi bi-info"></i>
                                        </a>
                                        <a href="{{ route('logs.edit', $log->id) }}" class="btn btn-sm btn-outline-dark">
                                            <i class=" bi bi-pencil"></i>
                                        </a>

                                        <button form="deleteForm" class=" btn btn-sm btn-outline-dark">
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
