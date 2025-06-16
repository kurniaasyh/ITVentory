@extends('layouts.main')

@section('content')
<div class="card" style="margin-top:40px;">
    <h2>Daftar Peminjaman yang Belum Dikembalikan</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Nama Alat</th>
                <th>Jumlah</th>
                <th>Tanggal Pinjam</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($loans as $loan)
                <tr>
                    <td>{{ $loan->inventory->name }}</td>
                    <td>{{ $loan->quantity }}</td>
                    <td>{{ $loan->borrow_date }}</td>
                    <td>
                        <form action="{{ route('returnLoan', $loan->id) }}" method="POST">

                            @csrf
                            <input type="date" name="return_date" required>
                            <button type="submit" class="btn btn-success btn-sm">Kembalikan</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
