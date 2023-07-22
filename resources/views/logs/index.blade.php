@extends('layouts.app')
@section('content')
    <div class=" container">
        <div class="row">
            <div class="col-12">
                @php
                    $toggle_trash_bin = request()->has('trash-bin') ? route('logs.index') : route('logs.index', ['trash-bin']);
                @endphp
                <div class=" search-form mb-3">
                    <form action="" class="">
                        <div class="input-group">
                            <a href="{{ $toggle_trash_bin }}" class=" btn">
                                <i class="bi {{ request()->has('trash-bin') ? 'bi-trash3' : 'bi-trash3-fill' }}"></i>
                            </a>
                            <input type="text" class=" form-control" name="q" value="{{ request()->q }}">
                            <button class=" btn btn-sm btn-dark">
                                <i class=" bi bi-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div class=" mt-5">
                    {{-- i know, DRY, component? --}}
                    @if (request()->is('*/tags/*'))
                        <h3>
                            Showing logs under
                            <span class=" text-primary">
                                #{{ request()->tag->name ?? 'bug' }}
                            </span>
                            @if ($logs->count() < 9)
                                :{{ $logs->count() }}->
                            @endif
                        </h3>
                    @endif

                    @if (request()->is('*/categories/*'))
                        <h3>
                            Showing logs in
                            <span class=" text-success">
                                {{ request()->category->name ?? 'bug' }}
                            </span>
                            @if ($logs->count() < 9)
                                : ({{ $logs->count() }})->
                            @endif
                        </h3>
                    @endif
                </div>
                <div class="">
                    {{ $logs->onEachSide(1)->links() }}
                </div>

                <table class=" table table-warning">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Tags</th>
                            <th>Control</th>
                            <th>Followers</th>
                            <th>Updated At</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($logs as $log)
                            <tr @class(['table-active' => $log->trashed()])>
                                <td>
                                    <x-norm-link :hLink="route('logs.edit', $log->id)" :hText="$log->id" class=" text-success" />
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
                                        <x-norm-link :hLink="route('logs.index.tag', $tag->id)" :hText="$tag->name" prepend='#' />
                                    @endforeach
                                </td>
                                <td>
                                    <div class="btn-group">
                                        @if (!$log->trashed())
                                        <x-buttons.icon :hLink="route('logs.show', $log->id)" icon="info" />
                                        <x-buttons.icon :hLink="route('logs.edit', $log->id)" icon="pencil" />
                                        <x-buttons.icon :hLink="route('page.log', $log->id)" icon="eye" />
                                        @endif
                                        <x-buttons.delete :action="route('logs.destroy', $log->id)" :id="$log->id" />
                                        @if ($log->trashed())
                                            <x-buttons.icon :hLink="route('logs.restore', $log->id)" icon="arrow-clockwise" />
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    {{ $log->emails->count() }}
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
