@extends('layouts.main')

@section('content')
<link rel="stylesheet" href="{{ asset('css/user.css') }}">

<div class="loan-form-container">
    <h2>Daftar Peminjaman yang Belum Dikembalikan</h2>

    @if (session('success'))
        <div class="success-message">{{ session('success') }}</div>
    @endif

    <div class="responsive-table">
        <table>
            <thead>
    <tr>
        <th>Nama Alat</th>
        <th>Jumlah</th>
        <th>Tanggal Pinjam</th>
        <th>Tanggal Kembali</th>
        @if (Auth::user()->is_admin)
            <th>Dipinjam Oleh</th>
        @endif
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
                <form action="{{ route('returnLoan', $loan->id) }}" method="POST" class="return-form">
                    @csrf
                    <input type="date" name="return_date" required class="input-date">
            </td>
            @if (Auth::user()->is_admin)
                <td>{{ $loan->user->name }}</td>
            @endif
            <td>
                <button type="submit" class="submit-btn">Kembalikan</button>
                </form>
            </td>
        </tr>
    @endforeach
</tbody>

        </table>
    </div>
</div>
@endsection
