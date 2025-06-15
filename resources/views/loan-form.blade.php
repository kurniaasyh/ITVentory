@extends('layouts.main')

@section('content')
    <div class="card" style="margin-top:40px;">
        <h2>Loan Form Page</h2>
        <form action="{{ route('loan.store') }}" method="POST" style="margin-top: 24px;">
            @csrf
            <div style="margin-bottom: 12px;">
                <label>Nama Alat:</label>
                <select name="inventory_id" class="form-control" required>
                    @foreach ($inventories as $inventory)
                        <option value="{{ $inventory->inventory_id }}">
                            {{ $inventory->name }} (Stok: {{ $inventory->total }})
                        </option>
                    @endforeach
                </select>
            </div>
            
    <div style="margin-bottom: 12px;">
        <label>Jumlah Pinjam:</label>
        <input type="number" name="quantity" min="1" required>
    </div>
    <div style="margin-bottom: 12px;">
        <label>Tanggal Pinjam:</label>
        <input type="date" name="borrow_date" required>
    </div>
            <button type="submit">Pinjam</button>
        </form>
    </div>
@endsection