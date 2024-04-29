@extends('admin.admin_dashboard')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Pharmacy</h4>
            <form method="POST" action="{{ route('admin.pharmacies.update', $pharmacy->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="user_id">User</label>
                    <select class="form-control" id="user_id" name="user_id">
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ $user->id == $pharmacy->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $pharmacy->name) }}">
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $pharmacy->address) }}">
                    @error('address')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $pharmacy->phone) }}">
                    @error('phone')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $pharmacy->email) }}">
                    @error('email')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="license_image">License Image</label>
                    <input type="file" class="form-control-file" id="license_image" name="license_image">
                    @error('license_image')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                    @if($pharmacy->license_image)
                        <img src="{{ asset('storage/' . $pharmacy->license_image) }}" alt="License Image" style="max-width: 70px; max-height: 70px;">
                    @else
                        No Image
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Update Pharmacy</button>
            </form>
        </div>
    </div>
@endsection
