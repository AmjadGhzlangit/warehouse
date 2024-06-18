@extends('customer.index')

@section('content')
    <div class="row">
        <div class="col-md-5 mr-auto">
            <div class="border text-center">
                <img src="{{ Storage::url($product->image) }}" alt="{{ $product->trading_name }}" class="img-fluid p-5">
            </div>
        </div>
        <div class="col-md-6">
            <h2 class="text-black">{{ $product->trading_name }}</h2>
            <p>{{ $product->description }}</p>
            <p>
                @if($product->sell_price < $product->price)
                    <del>${{ number_format($product->price, 2) }}</del>
                @endif
                <strong class="text-primary h4">${{ number_format($product->sell_price, 2) }}</strong>
            </p>
            <div class="mb-5">
                <div class="input-group mb-3" style="max-width: 220px;">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                    </div>
                    <input type="text" class="form-control text-center" value="1" placeholder=""
                           aria-label="Quantity" aria-describedby="button-addon1">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                    </div>
                </div>
            </div>
            <p><a href="{{ route('add-to-cart', $product->id) }}" class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary">Add To Cart</a></p>

        </div>
    </div>
@endsection
