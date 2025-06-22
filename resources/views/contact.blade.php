<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact - ITVentory</title>
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
        <div class="text-center max-w-xl">
            <h1 class="text-4xl sm:text-5xl font-bold leading-tight mb-4">Hubungi Kami</h1>
            <p class="text-lg sm:text-xl mb-6">Ada pertanyaan atau butuh bantuan? Silakan hubungi kami melalui informasi
                berikut:</p>
            <div class="bg-white text-gray-800 rounded-lg p-6 shadow-md">
                <p><strong>Email:</strong> itventory@fti.ac.id</p>
                <p><strong>WhatsApp:</strong> +62 8xx xxxx xxxx</p>
                <p><strong>Alamat:</strong> Fakultas Teknik Informatika, Universitas Yudharta Pasuruan</p>
            </div>
        </div>
    </div>
</body>

</html>
