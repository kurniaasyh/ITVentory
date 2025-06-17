@extends('layouts.main')

@section('content')
<link rel="stylesheet" href="{{ asset('css/user.css') }}">

<div class="loan-form-container">
    <h2>Inventory Loan Form</h2>

    @if(session('success'))
        <div class="success-message">{{ session('success') }}</div>
    @endif

    <form action="{{ route('loans.store') }}" method="POST">
        @csrf

        <div class="loan-form-group">
            <label>Nama Alat:</label>
            <select name="inventory_id" required>
                @foreach ($inventories as $inventory)
                    <option value="{{ $inventory->inventory_id }}">
                        {{ $inventory->name }} (Stok: {{ $inventory->total }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="loan-form-group">
            <label>Jumlah Pinjam:</label>
            <input type="number" name="quantity" min="1" required>
        </div>

        <div class="loan-form-group">
            <label>Tanggal Pinjam:</label>
            <input type="date" name="borrow_date" required>
        </div>

        <button type="submit" class="submit-btn">Submit Form</button>
    </form>
</div>
@endsection
