@extends('layouts.main')
@section('content')

<div class="card">
    <h2 style="margin-bottom: 20px;"><b>History Peminjaman</b></h2>
    <table>
<thead>
    <tr>
        <th>Nama Barang</th>
        <th>Tanggal Pinjam</th>
        <th>Tanggal Kembali</th>
        <th>Status</th>
    </tr>
</thead>
<tbody>
@foreach ($histories as $history)
<tr>
    <td>{{ $history->inventory->name ?? '-' }}</td>
    <td>{{ $history->borrow_date ?? '-' }}</td>
    <td>{{ $history->return_date ?? '-' }}</td>
    <td>
        <span class="badge {{ $history->status == 'Dipinjam' ? 'tersedia' : 'kosong' }}">
            {{ $history->status }}
        </span>
    </td>
</tr>
@endforeach
</tbody>
</table>

</div>

@endsection
