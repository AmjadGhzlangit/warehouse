@extends('customer.index')

@section('content')
    <div class="container">
        <h2>My Orders</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($orders->isEmpty())
            <p>You have no orders.</p>
        @else
            <table class="table">
                <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->date->format('Y-m-d') }}</td>
                        <td>{{ ucfirst($order->order_status) }}</td>
                        <td>${{ number_format($order->total, 2) }}</td>
                        <td><a href="{{ route('view-order', $order->id) }}" class="btn btn-primary btn-sm">View</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
