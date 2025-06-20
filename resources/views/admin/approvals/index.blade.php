@extends('layouts.admin')

@section('content')
<h2>Daftar Peminjaman Menunggu Persetujuan</h2>

@if(session('success'))
    <div style="color: green;">{{ session('success') }}</div>
@endif
@if(session('error'))
    <div style="color: red;">{{ session('error') }}</div>
@endif

<div class="card">
    <table>
        <thead>
            <tr>
                <th>Nama User</th>
                <th>Barang</th>
                <th>Jumlah</th>
                <th>Tanggal Pinjam</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($loans as $loan)
                <tr>
                    <td>{{ $loan->user->name }}</td>
                    <td>{{ $loan->inventory->name }}</td>
                    <td>{{ $loan->quantity }}</td>
                    <td>{{ $loan->borrow_date }}</td>
                    <td>
                        <form action="{{ route('admin.approve', $loan) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit">Setujui</button>
                        </form>
                        <form action="{{ route('admin.reject', $loan) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" onclick="return confirm('Tolak peminjaman ini?')">Tolak</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5">Tidak ada pengajuan peminjaman.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
