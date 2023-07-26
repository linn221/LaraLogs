@extends('layouts.app')
@section('content')
    <div class=" container-sm">
        <div class="row g-2">
            <div class="col-10">
                <div class="">
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

                                <td>
                                    <div class="">
                                        {{ $log->emails->count() }}
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
                <div class=" search-form mb-3">
                    <form action="{{ request()->fullUrl() }}" class="">
                        <div class="input-group">
                            <input type="text" class=" form-control" name="q" value="{{ request()->q }}">
                            <button class=" btn btn-sm btn-dark">
                                <i class=" bi bi-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <form action="{{ route('email.sub') }}" method="post">
                    @csrf
                    {{-- <label for="subscribe-mail" class=" form-label">
        Enter your Email Address
    </label> --}}
                    <input type="email" name="email-address" id="subscribe-mail"
                        class=" form-control @error('email-address') {{ 'is-invalid' }} @enderror"
                        value="{{ old('email-address', '') }}" placeholder="your email">

                    <button class="btn btn-sm btn-danger w-100">
                        Subscribe
                    </button>
                    @error('email-address')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </form>
            </div>
        </div>
    </div>
@endsection
