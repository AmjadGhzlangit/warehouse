@extends('admin.admin_dashboard')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Product</h4>
            <form method="POST" action="{{ route('admin.products.update', $product->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="scientific_name">Scientific Name</label>
                    <input type="text" class="form-control" id="scientific_name" name="scientific_name" value="{{ old('scientific_name', $product->scientific_name) }}">
                </div>
                <div class="form-group">
                    <label for="trading_name">Trading Name</label>
                    <input type="text" class="form-control" id="trading_name" name="trading_name" value="{{ old('trading_name', $product->trading_name) }}">
                </div>
                <div class="form-group">
                    <label for="manufacturer">Manufacturer Name</label>
                    <input type="text" class="form-control" id="manufacturer" name="manufacturer" value="{{ old('manufacturer', $product->manufacturer) }}">
                    @error('manufacturer')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select class="form-control" id="category_id" name="category_id">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $product->price) }}">
                    @error('price')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="sell_price">Sell Price</label>
                    <input type="number" class="form-control" id="sell_price" name="sell_price" value="{{ old('sell_price',$product->sell_price) }}">
                    @error('sell_price')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity', $product->quantity) }}">
                </div>
                <div class="form-group">
                    <label for="image">Product Image</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                    @error('image')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="License Image" style="max-width: 70px; max-height: 70px;">
                    @else
                        No Image
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Update Product</button>
            </form>
        </div>
    </div>
@endsection
