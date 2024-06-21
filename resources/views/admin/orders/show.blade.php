@extends('admin.admin_dashboard')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Order Details</h4>
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Order ID:</strong> {{ $order->id }}</p>
                    <p><strong>User Name:</strong> {{ $order->user->name }}</p>
                    <p><strong>Order Date:</strong> {{ $order->created_at->format('d M Y') }}</p>
                    <p><strong>Status:</strong> {{ $order->order_status }}</p>
                    <p><strong>Total Amount:</strong> ${{ $order->total }}</p>
                </div>
            </div>
            <h4 class="mt-4">Order Items</h4>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Product Name</th>
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
                            <td>${{ $item->price_item }}</td>
                            <td>${{ $item->quantity_item * $item->product->price }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary mt-3">Back to Orders</a>
            <a href="{{ route('admin.orders.edit',$order->id) }}" class="btn btn-primary mt-3">Edit Order</a>
        </div>
    </div>
@endsection
