@extends('layouts.app')
@section('content')
    <div class=" container">
        <div class="row">
            <div class="col-12">
                <x-search-bar />
                <div class=" mt-5">
                    {{-- i know, DRY, component? --}}
                    @if (request()->is('tag/*'))
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

                    @if (request()->is('category/*'))
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
                            <th>Title</th>
                            <th>Category</th>
                            <th>Tags</th>
                            <th>Posted</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($logs as $log)
                            <tr>
                                <td>
                                    <x-norm-link :hLink="route('page.log', $log->id)" :hText="$log->title" class="text-dark" />
                                    <br>
                                    <span class=" small text-black-50">
                                        {{ Str::limit($log->content, 30, '...') }}
                                    </span>
                                </td>

                                <td>
                                    <x-norm-link :hLink="route('page.category', $log->category->id)" :hText="$log->category->name" class="text-dark" />
                                </td>

                                <td>
                                    {{-- copy & paste proudly from show view --}}
                                    {{-- no more, with using component --}}
                                    {{-- {{ dd($log->tags) }} --}}
                                    @foreach ($log->tags as $tag)
                                    {{-- yellow, make me a tag-link component! --}}
                                        <x-norm-link :hLink="route('page.tag', $tag->id)" :hText="'#'.$tag->name"/>
                                    @endforeach
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
                                        There is no log.
                                    </p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
