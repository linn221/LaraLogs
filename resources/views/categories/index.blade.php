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

                <table class=" table">
                    <tr>
                        <td>
                            $category_name ($logs_count) (link to see logs under the category)
                        </td>
                    </tr>
                </table>
                <div class="">
                    {{-- {{ $categories->onEachSide(1)->links() }} --}}
                </div>

            </div>
        </div>
    </div>
@endsection