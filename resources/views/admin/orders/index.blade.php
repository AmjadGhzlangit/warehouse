@extends('admin.admin_dashboard')

@section('content')
    <div class="card">
        <div class="card-body">
    <h4>Orders List</h4>
    <div class="table-responsive">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Date</th>
            <th>Total</th>
            <th>User</th>
            <th>User Phone</th>
            <th>Status</th>

            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->date }}</td>
                <td>{{ $order->total }}</td>
                <td>{{ $order->user->name }}</td>
                <td>{{ $order->user->phone }}</td>
                <td>{{ $order->order_status }}</td>
                <td>
                    <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this order?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $orders->links() }} <!-- Pagination links -->
    </div>
    </div>
    </div>
@endsection

