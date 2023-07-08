@extends('layouts.app')
@section('content')
    <div class=" container">
        <div class="row">
            <div class="col-12">
                <h3>Tag List</h3>
                <hr>

                <div class=" mb-3">
                    <a href="{{ route('tags.create') }}" class="btn btn-outline-dark">Create</a>
                </div>

                <table class=" table table-responsive-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Logs</th>
                            <th>Control</th>
                        </tr>
                        {{-- $category_name ($logs_count) (link to see logs under the category) --}}
                    </thead>
                    <tbody>
                        @forelse ($tags as $tag)
                            <tr>
                                <td>
                                    {{ $tag->id }}
                                </td>
                                <td>
                                    {{ $tag->name }}
                                </td>
                                <td>
                                    <a href="{{ route('logs.index.tag', ['tag' => $tag->id]) }}">
                                        {{ $tag->logs()->count(); }}
                                    </a>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <x-buttons.icon icon="pencil" :hLink="route('tags.edit', $tag->id)" />
                                        <x-buttons.delete :action="route('tags.destroy', $tag->id)" />
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class=" text-center">
                                    <p>
                                        There is no record
                                    </p>
                                    <a class=" btn btn-sm btn-primary" href="{{ route('tags.create') }}">Create Tag</a>
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
