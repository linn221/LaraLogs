@extends('layouts.app')
@section('content')
    <div class=" container-sm">
        <div class="row g-4">
            <div class="col-9">
                {{-- i know, DRY, component? --}}
                <div class=" d-flex justify-content-between align-items-center pb-3">
                    @if (request()->is('tag/*'))
                        <div class="">
                            <h5>
                                Showing logs under
                                <span class=" text-primary">
                                    #{{ request()->tag->name ?? 'bug' }}
                                </span>
                                @if ($logs->count() < 9)
                                    ({{ $logs->count() }})
                                @endif
                            </h5>
                        </div>
                    @endif

                    @if (request()->is('category/*'))
                        <div class="">
                            <h5>
                                Showing logs in
                                <span class=" text-success">
                                    {{ request()->category->name ?? 'bug' }}
                                </span>
                                @if ($logs->count() < 9)
                                    ({{ $logs->count() }})
                                @endif
                        </div>
                        </h5>
                    @endif
                    <div class=" search-form mb-1">
                        <form action="{{ request()->fullUrl() }}" class="">
                            <div class="input-group">
                                <input type="text" class=" form-control" name="q" value="{{ request()->q }}">
                                <button class=" btn btn-dark">
                                    <i class=" bi bi-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <table class=" table">
                    <thead>
                        <tr>
                            {{-- yellow, make them post request and store in sesssion? --}}
                            <th>
                                <x-norm-link :hLink="request()->fullUrlWithQuery([
                                    'sort' => 'title',
                                    'order' => request()->order == 'desc' ? 'asc' : 'desc',
                                ])" hText='Title' />
                            </th>
                            <th>
                                <x-norm-link :hLink="request()->fullUrlWithQuery([
                                    'sort' => 'category_id',
                                    'order' => request()->order == 'desc' ? 'asc' : 'desc',
                                ])" hText='Category' />
                            </th>
                            <th>
                                watch
                            </th>
                            <th>
                                <x-norm-link :hLink="request()->fullUrlWithQuery([
                                    'sort' => 'created_at',
                                    'order' => request()->order == 'desc' ? 'asc' : 'desc',
                                ])" hText='Posted' />
                            </th>
                            {{-- <th>Tags</th>
                            <th>Posted</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($logs as $log)
                            <tr>
                                <td>
                                    <x-norm-link :hLink="route('page.log', $log->id)" :hText="Str::limit($log->title, 40, '...')" class="text-dark" />
                                    <br>
                                    <span class=" small text-black-50">
                                        {{ Str::limit($log->content, 50, '...') }}
                                    </span>
                                </td>

                                <td>
                                    <x-norm-link :hLink="route('page.category', $log->category->id)" :hText="$log->category->name" class="text-dark" />
                                    <br>
                                    @foreach ($log->tags as $tag)
                                        <x-norm-link :hLink="route('page.tag', $tag->id)" :hText="$tag->name" prepend='#' />
                                    @endforeach
                                </td>

                                <td class="">
                                    <div class="">
                                        {{ $log->emails_count }}
                                    </div>
                                </td>

                                <td>
                                    <p class=" small mb-0">
                                        <i class=" bi bi-clock"></i>

                                        {{ $log->created_at->diffForHumans() }}
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
                                        There is no log.
                                    </p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="">
                    {{ $logs->onEachSide(1)->links() }}
                </div>
            </div>
            <div class="col-3">
                @include('layouts.sidebar')
            </div>
        </div>
    </div>
@endsection
