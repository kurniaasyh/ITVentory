@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h2>Add New Item</h2>

    <form action="{{ route('admin.inventories.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Item Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter item name" required>
        </div>

        <div class="form-group mt-3">
            <label for="code">Item Code</label>
            <input type="text" name="code" class="form-control" placeholder="Enter item code" required>
        </div>

        <div class="form-group mt-3">
            <label for="total">Total Quantity</label>
            <input type="number" name="total" class="form-control" placeholder="Enter total quantity" required>
        </div>

        <div class="form-group mt-3">
            <label for="status">Status</label>
            <select name="status" class="form-control" required>
                <option value="">-- Select Status --</option>
                <option value="Tersedia">Tersedia</option>
                <option value="Kosong">Kosong</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-4">Save Item</button>
        <a href="{{ route('admin.inventories.index') }}" class="btn btn-secondary mt-4">Cancel</a>
    </form>
</div>
@endsection
