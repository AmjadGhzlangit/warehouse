@extends('customer.index')

@section('content')
    <div class="container">
        <h2>Order Details</h2>

        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Order #{{ $order->id }}</h5>
                <p class="card-text"><strong>Date:</strong> {{ $order->date }}</p>
                <p class="card-text"><strong>Status:</strong> {{ $order->order_status }}</p>
                <p class="card-text"><strong>Total:</strong> ${{ number_format($order->total, 2) }}</p>
            </div>
        </div>

        <h3>User Details</h3>
        <div class="card mb-4">
            <div class="card-body">
                <p class="card-text"><strong>Name:</strong> {{ $user->name }}</p>
                <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
                <p class="card-text"><strong>Address:</strong> {{ $user->address }}</p>
                <p class="card-text"><strong>Phone:</strong> {{ $user->phone }}</p>
            </div>
        </div>

        <h3>Items</h3>
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
