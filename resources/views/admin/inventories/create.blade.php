@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">

<div class="container">
    <h2>Add New Item</h2>

    <form action="{{ route('admin.inventories.store') }}" method="POST">
        @csrf

        <label for="name">Item Name</label>
        <input type="text" name="name" placeholder="Enter item name" required>

        <label for="code">Item Code</label>
        <input type="text" name="code" placeholder="Enter item code" required>

        <label for="total">Total Quantity</label>
        <input type="number" name="total" placeholder="Enter total quantity" required>

        <label for="status">Status</label>
        <select name="status" required>
            <option value="">-- Select Status --</option>
            <option value="Tersedia">Tersedia</option>
            <option value="Kosong">Kosong</option>
        </select>

        <button type="submit" class="btn btn-primary">Save Item</button>
        <a href="{{ route('admin.inventories.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
