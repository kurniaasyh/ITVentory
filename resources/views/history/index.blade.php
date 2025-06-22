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
                            @php
                                $status = $history->status;
                                $badgeClass = 'kosong'; // default

                                switch ($status) {
                                    case 'Disetujui':
                                        $badgeClass = 'tersedia';
                                        $statusText = 'Disetujui - Dipinjam';
                                        break;
                                    case 'Dipinjam':
                                        $badgeClass = 'tersedia';
                                        $statusText = 'Menunggu Persetujuan';
                                        break;
                                    case 'Ditolak':
                                        $badgeClass = 'kosong';
                                        $statusText = 'Ditolak';
                                        break;
                                    case 'Dikembalikan':
                                        $badgeClass = 'tersedia';
                                        $statusText = 'Dikembalikan';
                                        break;
                                    default:
                                        $statusText = $status;
                                }
                            @endphp

                            <span class="badge {{ $badgeClass }}">
                                {{ $statusText }}
                            </span>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
