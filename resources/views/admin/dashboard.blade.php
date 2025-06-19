@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">

<div class="card-container">
    <h2>Riwayat Peminjaman Terbaru</h2>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Nama User</th>
                    <th>Nama Alat</th>
                    <th>Jumlah</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($recentLoans as $loan)
                <tr>
                    <td>{{ $loan->user->name }}</td>
                    <td>{{ $loan->inventory->name }}</td>
                    <td>{{ $loan->quantity }}</td>
                    <td>{{ $loan->borrow_date }}</td>
                    <td>{{ $loan->return_date ?? '-' }}</td>
                    <td>{{ $loan->status }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Belum ada peminjaman.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
