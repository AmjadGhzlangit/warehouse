@extends('customer.index')

@section('content')
    <div class="row mb-5">
        <form class="col-md-12" method="post" action="{{ route('update-cart') }}">
            @csrf
            <div class="site-blocks-table">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th class="product-thumbnail">Image</th>
                        <th class="product-name">Product</th>
                        <th class="product-price">Price</th>
                        <th class="product-quantity">Quantity</th>
                        <th class="product-total">Total</th>
                        <th class="product-remove">Remove</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cart as $id => $item)
                        <tr>
                            <td class="product-thumbnail">
                                <img src="{{ Storage::url($item['image']) }}" alt="Image" class="img-fluid">
                            </td>
                            <td class="product-name">
                                <h2 class="h5 text-black">{{ $item['name'] }}</h2>
                            </td>
                            <td>${{ number_format($item['price'], 2) }}</td>
                            <td>
                                <div class="input-group mb-3" style="max-width: 120px;">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                                    </div>
                                    <input type="text" name="quantities[{{ $id }}]" class="form-control text-center quantity-input" value="{{ $item['quantity'] }}" placeholder=""
                                           aria-label="Example text with button addon" aria-describedby="button-addon1">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                                    </div>
                                </div>
                            </td>
                            <td>${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                            <td><a href="{{ route('remove-from-cart', $id) }}" class="btn btn-primary height-auto btn-sm">X</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row mb-5">
                <div class="col-md-6 mb-3 mb-md-0">
                    <button type="submit" class="btn btn-primary btn-md btn-block">Update Cart</button>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('view-products') }}" class="btn btn-outline-primary btn-md btn-block">Continue Shopping</a>
                </div>
            </div>
        </form>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <label class="text-black h4" for="coupon">Coupon</label>
                    <p>Enter your coupon code if you have one.</p>
                </div>
                <div class="col-md-8 mb-3 mb-md-0">
                    <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
                </div>
                <div class="col-md-4">
                    <button class="btn btn-primary btn-md px-4">Apply Coupon</button>
                </div>
            </div>
        </div>
        <div class="col-md-6 pl-5">
            <div class="row justify-content-end">
                <div class="col-md-7">
                    <div class="row">
                        <div class="col-md-12 text-right border-bottom mb-5">
                            <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <span class="text-black">Subtotal</span>
                        </div>
                        <div class="col-md-6 text-right">
                            <strong class="text-black">${{ number_format($subtotal, 2) }}</strong>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-md-6">
                            <span class="text-black">Total</span>
                        </div>
                        <div class="col-md-6 text-right">
                            <strong class="text-black">${{ number_format($total, 2) }}</strong>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ route('checkout') }}" class="btn btn-primary btn-lg btn-block">Proceed To Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.js-btn-plus').forEach(function (button) {
                button.addEventListener('click', function () {
                    let input = this.closest('.input-group').querySelector('.quantity-input');
                    input.value = parseInt(input.value) + 1;
                });
            });

            document.querySelectorAll('.js-btn-minus').forEach(function (button) {
                button.addEventListener('click', function () {
                    let input = this.closest('.input-group').querySelector('.quantity-input');
                    if (input.value > 1) {
                        input.value = parseInt(input.value) - 1;
                    }
                });
            });

            document.querySelectorAll('.quantity-input').forEach(function (input) {
                input.addEventListener('input', function () {
                    if (input.value < 1) {
                        input.value = 1;
                    }
                });
            });
        });
    </script>
@endsection
