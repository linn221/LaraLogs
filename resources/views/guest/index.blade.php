@extends('layouts.app')
@section('content')
    <div class=" container-sm">
        <div class="row g-2">
            <div class="col-10">
                <div class=" mb-3">
                    {{-- i know, DRY, component? --}}
                    @if (request()->is('tag/*'))
                        <h4>
                            Showing logs under
                            <span class=" text-primary">
                                #{{ request()->tag->name ?? 'bug' }}
                            </span>
                            @if ($logs->count() < 9)
                                ({{ $logs->count() }})
                            @endif
                        </h4>
                    @endif

                    @if (request()->is('category/*'))
                        <h4>
                            Showing logs in
                            <span class=" text-success">
                                {{ request()->category->name ?? 'bug' }}
                            </span>
                            @if ($logs->count() < 9)
                                ({{ $logs->count() }})
                            @endif
                        </h4>
                    @endif
                </div>
                <div class="">
                    {{ $logs->onEachSide(1)->links() }}
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
                                        <x-norm-link :hLink="route('page.tag', $tag->id)" :hText="$tag->name" prepend='#'/>
                                    @endforeach
                                </td>

                                <td>
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
            </div>
            <div class="col-2">
                @include('layouts.sidebar')
            </div>
        </div>
    </div>
@endsection
