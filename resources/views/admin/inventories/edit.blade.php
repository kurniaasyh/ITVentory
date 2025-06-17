@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">

<div class="container">
    <h2>Edit Item</h2>

    <form action="{{ route('admin.inventories.update', $inventory->inventory_id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Item Name</label>
        <input type="text" name="name" value="{{ $inventory->name }}" required>

        <label for="total">Total Quantity</label>
        <input type="number" name="total" value="{{ $inventory->total }}" required>

        <label for="status">Status</label>
        <select name="status" required>
            <option value="">-- Select Status --</option>
            <option value="Tersedia" {{ $inventory->status == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
            <option value="Kosong" {{ $inventory->status == 'Kosong' ? 'selected' : '' }}>Kosong</option>
        </select>

        <button type="submit" class="btn btn-primary">Update Item</button>
        <a href="{{ route('admin.inventories.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
