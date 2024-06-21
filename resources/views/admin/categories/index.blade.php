@extends('admin.admin_dashboard')

@section('content')
    <div class="d-flex grid-margin stretch-card">
        <div class="card">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card-body">
                <div class="d-flex flex-wrap justify-content-between">
                    <h4 class="card-title mb-3">Category List</h4>
                    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary btn-sm">Add New Category</a>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->code }}</td>
                                <td>
                                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-sm btn-secondary">Edit</a>
                                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                                    </form>

                                    <a href="{{ route('admin.categories.show', $category->id) }}" class="btn btn-sm btn-primary">Show</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">No categories found</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    <div>{{$categories->links()}}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
