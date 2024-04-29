@extends('admin.admin_dashboard')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Category Details</h4>
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Name:</strong> {{ $category->name }}</p>
                    <p><strong>Code:</strong> {{ $category->code }}</p>
                </div>
            </div>
            <div class="mt-3">
                <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-primary">Edit</a>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
@endsection
