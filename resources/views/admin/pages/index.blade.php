@extends('admin.admin_dashboard')

@section('content')
{{--    <div class="d-flex grid-margin stretch-card">--}}
{{--        <div class="card">--}}
{{--            <div class="card-body">--}}
{{--                <div class="d-flex flex-wrap justify-content-between">--}}
{{--                    <h4 class="card-title mb-3">Warehouse List</h4>--}}
{{--                    <a href="{{ route('admin.warehouses.create') }}" class="btn btn-primary btn-sm">Add New Warehouse</a>--}}
{{--                </div>--}}
{{--                <div class="table-responsive">--}}
{{--                    <table class="table">--}}
{{--                        <thead>--}}
{{--                        <tr>--}}
{{--                            <th>Location</th>--}}
{{--                            <th>Capacity</th>--}}
{{--                            <th>Phone</th>--}}
{{--                            <th>Action</th>--}}
{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody>--}}
{{--                        @forelse ($warehouses as $warehouse)--}}
{{--                            <tr>--}}
{{--                                <td>{{ $warehouse->location }}</td>--}}
{{--                                <td>{{ $warehouse->capacity }}</td>--}}
{{--                                <td>{{ $warehouse->phone }}</td>--}}
{{--                                <td>--}}
{{--                                    <a href="{{ route('admin.warehouses.edit', $warehouse->id) }}" class="btn btn-sm btn-secondary">Edit</a>--}}
{{--                                    <form action="{{ route('admin.warehouses.destroy', $warehouse->id) }}" method="POST" style="display: inline-block;">--}}
{{--                                        @csrf--}}
{{--                                        @method('DELETE')--}}
{{--                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this warehouse?')">Delete</button>--}}
{{--                                    </form>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                        @empty--}}
{{--                            <tr>--}}
{{--                                <td colspan="4" class="text-center">No warehouses found</td>--}}
{{--                            </tr>--}}
{{--                        @endforelse--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
