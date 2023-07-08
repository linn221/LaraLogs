@extends('layouts.app')
@section('content')
    <div class=" container">
        <div class="row">
            <div class="col-12">
                <h3>Category List</h3>
                <hr>

                <div class=" mb-3">
                    <a href="{{ route('categories.create') }}" class="btn btn-outline-dark">Create</a>
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
                        @forelse ($categories as $category)
                            <tr>
                                <td>
                                    {{ $category->id }}
                                </td>
                                <td>
                                    {{ $category->name }}
                                </td>
                                <td>
                                    <x-norm-link :hLink="route('logs.index.category', $category->id)" :hText="$category->logs()->count()" />
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <x-buttons.icon icon="pencil" :hLink="route('categories.edit', $category->id)" />
                                        <x-buttons.delete :action="route('categories.destroy', $category->id)" />
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class=" text-center">
                                    <p>
                                        There is no record
                                    </p>
                                    <a class=" btn btn-sm btn-primary" href="{{ route('categories.create') }}">Create Category</a>
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
