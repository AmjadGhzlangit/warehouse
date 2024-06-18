@extends('customer.index')

@section('content')
    <div class="row mb-5">
        <div class="col-md-12">
            <div class="site-blocks-table">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th class="product-thumbnail">Image</th>
                        <th class="product-name">Product</th>
                        <th class="product-price">Price</th>
                        <th class="product-quantity">Quantity</th>
                        <th class="product-total">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($cart as $id => $item)
                        <tr>
                            <td class="product-thumbnail">
                                <img src="{{ $item['image'] }}" alt="Product Image" class="img-fluid">
                            </td>
                            <td class="product-name">
                                <h2 class="h5 text-black">{{ $item['name'] }}</h2>
                            </td>
                            <td>${{ number_format($item['price'], 2) }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="4" class="text-right"><strong>Subtotal</strong></td>
                        <td>${{ number_format($subtotal, 2) }}</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-right"><strong>Total</strong></td>
                        <td>${{ number_format($total, 2) }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <!-- Additional fields for shipping information, coupon, etc. can be added here -->
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('create-order') }}" class="btn btn-primary btn-lg">Proceed to Payment</a>

        </div>
    </div>
@endsection
