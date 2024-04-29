@extends('admin.admin_dashboard')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Product Details</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Scientific Name:</strong> {{ $product->scientific_name }}</p>
                    <p><strong>Trading Name:</strong> {{ $product->trading_name }}</p>
                    <p><strong>Category:</strong> {{ $product->category->name }}</p>
                    <p><strong>Price:</strong> ${{ $product->price }}</p>
                    <p><strong>Quantity:</strong> {{ $product->quantity }}</p>
                </div>
                <div class="col-md-4">
                    @if ($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="img-fluid">
                    @else
                        <p>No Image</p>
                    @endif
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
@endsection
