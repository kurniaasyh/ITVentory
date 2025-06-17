@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h2>Edit Item</h2>

    <form action="{{ route('admin.inventories.update', $inventory->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Item Name</label>
            <input type="text" name="name" class="form-control" value="{{ $inventory->name }}" required>
        </div>

        <div class="form-group mt-3">
            <label for="total">Total Quantity</label>
            <input type="number" name="total" class="form-control" value="{{ $inventory->total }}" required>
        </div>

        <div class="form-group mt-3">
            <label for="status">Status</label>
            <select name="status" class="form-control" required>
                <option value="">-- Select Status --</option>
                <option value="Tersedia" {{ $inventory->status == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                <option value="Kosong" {{ $inventory->status == 'Kosong' ? 'selected' : '' }}>Kosong</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-4">Update Item</button>
        <a href="{{ route('admin.inventories.index') }}" class="btn btn-secondary mt-4">Cancel</a>
    </form>
</div>
@endsection
