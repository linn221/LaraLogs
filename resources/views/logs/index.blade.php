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
                <div>
                    <h4>{{ $banner ?? '' }}</h4>
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
                                    <x-norm-link :hLink="route('logs.edit', $log->id)" :hText="$log->id" />
                                </td>
                                <td>
                                    <x-norm-link :hLink="route('logs.show', $log->id)" :hText="$log->title" class="text-dark" />
                                    <br>
                                    <span class=" small text-black-50">
                                        {{ Str::limit($log->content, 30, '...') }}
                                        {{-- {{ Str::limit($category->description, 30, '...') }} --}}
                                    </span>
                                </td>

                                <td>
                                    <x-norm-link :hLink="route('logs.index.category', $log->category->id)" :hText="$log->category->name" class="text-dark" />
                                </td>

                                <td>
                                    {{-- copy & paste proudly from show view --}}
                                    {{-- no more, with using component --}}
                                    @foreach ($log->tags as $tag)
                                        <x-tag-link :id="$tag->id" :name="$tag->name" />
                                    @endforeach
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <x-buttons.icon :hLink="route('logs.show', $log->id)" icon="info" />
                                        <x-buttons.icon :hLink="route('logs.edit', $log->id)" icon="pencil" />
                                        <x-buttons.delete :action="route('logs.destroy', $log->id)" />
                                    </div>
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
            </div>
        </div>
    </div>
@endsection
