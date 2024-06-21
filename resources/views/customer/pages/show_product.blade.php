@extends('customer.index')

@section('content')
    <div class="row">
        <div class="col-md-5 mr-auto">
            <div class="border text-center">
                <img src="{{ Storage::url($product->image) }}" alt="{{ $product->trading_name }}" class="img-fluid p-5">
            </div>
        </div>
        <div class="col-md-6">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
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
                    <input type="text" class="form-control text-center quantity-input" name="quantity" value="1" placeholder=""
                           aria-label="Quantity" aria-describedby="button-addon1">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                    </div>
                </div>
            </div>
            <form action="{{ route('add-to-cart', $product->id) }}" method="GET">
                @csrf
                <input type="hidden" name="quantity" class="quantity-hidden-input" value="1">
                <button type="submit" class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary">Add To Cart</button>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const quantityInput = document.querySelector('.quantity-input');
            const quantityHiddenInput = document.querySelector('.quantity-hidden-input');

            document.querySelector('.js-btn-plus').addEventListener('click', function () {
                quantityInput.value = parseInt(quantityInput.value) + 1;
                quantityHiddenInput.value = quantityInput.value;
            });

            document.querySelector('.js-btn-minus').addEventListener('click', function () {
                if (quantityInput.value > 1) {
                    quantityInput.value = parseInt(quantityInput.value) - 1;
                    quantityHiddenInput.value = quantityInput.value;
                }
            });

            quantityInput.addEventListener('input', function () {
                if (quantityInput.value < 1) {
                    quantityInput.value = 1;
                }
                quantityHiddenInput.value = quantityInput.value;
            });
        });
    </script>
@endsection
