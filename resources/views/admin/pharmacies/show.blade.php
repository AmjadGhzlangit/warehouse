@extends('admin.admin_dashboard')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Pharmacy Details</h4>
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Name:</strong> {{ $pharmacy->name }}</p>
                    <p><strong>Address:</strong> {{ $pharmacy->address }}</p>
                    <p><strong>Phone:</strong> {{ $pharmacy->phone }}</p>
                    <p><strong>Email:</strong> {{ $pharmacy->email }}</p>
                    <p><strong>Is Active:</strong> {{ $pharmacy->is_active ? 'Active' : 'Inactive' }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>User:</strong> {{ $pharmacy->user->name }}</p> <!-- Display user's name -->
                    <p><strong>License Image:</strong></p>
                    @if($pharmacy->license_image)
                        <img src="{{ asset('storage/' . $pharmacy->license_image) }}" alt="License Image" style="max-width: 70%;">
                    @else
                        No Image
                    @endif
                </div>
            </div>
            <a href="{{ route('admin.pharmacies.edit', $pharmacy->id) }}" class="btn btn-primary">Edit</a>
            <a href="{{ route('admin.pharmacies.active', $pharmacy->id) }}" class="btn btn-primary">Active</a>
            <a href="{{ route('admin.pharmacies.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
@endsection
