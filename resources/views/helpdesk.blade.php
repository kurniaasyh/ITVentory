@extends('layouts.main')

@section('content')
<div class="card" style="margin-top:40px;">
    <h2>Helpdesk - Pusat Bantuan</h2>

    <p>Selamat datang di halaman bantuan ITVentory. Berikut beberapa informasi yang dapat membantu Anda:</p>

    <h4>Cara Melakukan Peminjaman:</h4>
    <ol>
        <li>Masuk ke akun Anda.</li>
        <li>Pilih menu <b>Peminjaman</b> untuk mengajukan peminjaman alat.</li>
        <li>Isi form peminjaman dengan benar sesuai kebutuhan.</li>
        <li>Pastikan stok alat masih tersedia sebelum meminjam.</li>
    </ol>

    <h4>Cara Melakukan Pengembalian:</h4>
    <ol>
        <li>Masuk ke menu <b>Pengembalian</b>.</li>
        <li>Pilih peminjaman yang akan dikembalikan.</li>
        <li>Isi tanggal pengembalian, lalu klik tombol kembalikan.</li>
    </ol>

    <h4>Kontak Admin:</h4>
    <ul>
        <li>Email: admin@ITventory.ac.id</li>
        <li>WA: +62 8xx-xxxx-xxxx</li>
        <li>Jam Kerja: Senin - Jumat (08:00 - 16:00)</li>
    </ul>

    <p>Jika masih ada kendala, silakan hubungi admin atau datang langsung ke kantor Fakultas IT.</p>
</div>
@endsection
