<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About - ITVentory</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
    <style>
        body {
            background: linear-gradient(to right, #2563EB, #1E3A8A);
            color: white;
        }
    </style>
</head>

<body class="pt-20">
    @include('components.navbar')

    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="text-center max-w-2xl">
            <h1 class="text-4xl sm:text-5xl font-bold leading-tight mb-4">Tentang <span
                    style="color:#052950">IT</span><span style="color:#ffc107">Ventory</span></h1>
            <p class="text-lg sm:text-xl mb-6">
                ITVentory adalah sistem manajemen inventaris yang dirancang khusus untuk Fakultas Teknik Informatika.
                Sistem ini bertujuan untuk mencatat dan mengelola aset-aset seperti komputer, perangkat jaringan, dan
                alat laboratorium secara efisien dan transparan.
            </p>
            <p class="text-md sm:text-lg">
                Dibangun dengan semangat transparansi dan efisiensi, ITVentory membantu pengguna dalam pelacakan barang,
                pembuatan laporan otomatis, dan mendukung peran pengguna berbeda dalam satu sistem yang terintegrasi.
            </p>
        </div>
    </div>
</body>

</html>
