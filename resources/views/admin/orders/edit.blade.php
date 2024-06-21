@extends('admin.admin_dashboard')

@section('content')
    <div class="card">
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif            <h4 class="card-title">Edit Order</h4>
            <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="order_status">Order Status</label>
                    <select class="form-control" id="order_status" name="order_status" required>
                        @foreach(\App\Enums\OrderStatusType::cases() as $status)
                            <option value="{{ $status }}" {{ $order->order_status == $status ? 'selected' : '' }}>
                                {{ $status }}
                            </option>
                        @endforeach
                    </select>
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
                                <td>
                                    <input type="number" class="form-control" name="order_items[{{ $item->id }}][quantity_item]" value="{{ $item->quantity_item }}" min="1" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control" name="order_items[{{ $item->id }}][price_item]" value="{{ $item->price_item }}" min="0" step="0.01" required>
                                </td>
                                <td>{{ number_format($item->quantity_item * $item->price_item, 2) }}</td>
                                <input type="hidden" name="order_items[{{ $item->id }}][id]" value="{{ $item->id }}">
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Update Order</button>
                <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary mt-3">Back</a>
            </form>
        </div>
    </div>
@endsection
