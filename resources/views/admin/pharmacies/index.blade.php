@extends('admin.admin_dashboard')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex flex-wrap justify-content-between">
                <h4 class="card-title mb-3">Pharmacy List</h4>
                <a href="{{ route('admin.categories.create') }}" class="btn btn-primary mb-3">Add New Pharmacy</a>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>User Name</th>
                        <th>Pharmacy Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Active</th>
                        <th>License Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pharmacies as $pharmacy)
                        <tr>
                            <td>{{ $pharmacy->user->name ?? '' }}</td>
                            <td>{{ $pharmacy->name }}</td>
                            <td>{{ $pharmacy->address }}</td>
                            <td>{{ $pharmacy->phone }}</td>
                            <td>{{ $pharmacy->email }}</td>
                            <td>{{ $pharmacy->is_active ? 'Active' : 'Inactive' }}</td>
                            <td>
                                @if($pharmacy->license_image)
                                    <img src="{{ asset('storage/' . $pharmacy->license_image) }}" alt="License Image" style="max-width: 100px; max-height: 100px;">
                                @else
                                    No Image
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.pharmacies.show', $pharmacy->id) }}" class="btn btn-primary btn-sm">View</a>
                                <a href="{{ route('admin.pharmacies.edit', $pharmacy->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                                <form action="{{ route('admin.pharmacies.destroy', $pharmacy->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this pharmacy?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div>{{$pharmacies->links()}}</div>
            </div>
        </div>
    </div>
@endsection
