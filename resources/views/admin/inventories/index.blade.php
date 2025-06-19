@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">

<div class="container">
    <h2>Inventory Management</h2>

    <a href="{{ route('admin.inventories.create') }}">
        <button style="margin-bottom: 10px;" class="btn btn-primary">+ Add New Item</button>
    </a>
    <a href="{{ route('admin.loans.export') }}" class="btn btn-primary">Download Excel</a>
    <div class="table-container">
        <table>
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
                    <td style="display: flex; gap: 8px; justify-content: center;">
                        <a href="{{ route('admin.inventories.edit', $item->inventory_id) }}">
                            <button class="btn btn-primary">Edit</button>
                        </a>
                        <form action="{{ route('admin.inventories.destroy', $item->inventory_id) }}" method="POST" onsubmit="return confirm('Delete this item?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-secondary">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
