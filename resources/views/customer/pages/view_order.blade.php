@extends('customer.index')

@section('content')
    <div class="container">
        <h2>Order Details</h2>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Order #{{ $order->id }}</h5>
                <p class="card-text"><strong>Date:</strong> {{ $order->date }}</p>
                <p class="card-text"><strong>Status:</strong> {{ $order->order_status }}</p>
                <p class="card-text"><strong>Total:</strong> ${{ number_format($order->total, 2) }}</p>
            </div>
        </div>

        <h3 class="mt-4">Items</h3>
        <table class="table">
            <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody>
            @foreach($order->orderItems as $item)
                <tr>
                    <td>{{ $item->product->trading_name }}</td>
                    <td>{{ $item->quantity_item }}</td>
                    <td>${{ number_format($item->price_item, 2) }}</td>
                    <td>${{ number_format($item->quantity_item * $item->price_item, 2) }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
