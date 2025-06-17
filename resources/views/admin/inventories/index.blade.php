@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h2>Inventory Management</h2>

    <a href="{{ route('admin.inventories.create') }}" class="btn btn-success mb-3">+ Add New Item</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Item Name</th>
                <th>Total</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($inventories as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->total }}</td>
                    <td>{{ $item->status }}</td>
                    <td>
                        <a href="{{ route('admin.inventories.edit', $item->inventory_id) }}" class="btn btn-warning btn-sm">Edit</a>
<form action="{{ route('admin.inventories.destroy', $item->inventory_id) }}" method="POST" style="display:inline;">

                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete this item?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
