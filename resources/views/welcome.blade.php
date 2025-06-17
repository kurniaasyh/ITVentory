<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Welcome - ITVentory</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
  <style>
    body {
      background: linear-gradient(to right, #2563EB, #1E3A8A);
      color: white;
    }
  </style>
</head>
<body class="flex items-center justify-center min-h-screen px-4">

  <div class="text-center max-w-xl">
    <h1 class="text-4xl sm:text-5xl font-bold leading-tight mb-4">
      Selamat<br />
      Datang Di <span style="color:#052950">IT</span><span style="color:#ffc107">Ventory</span>
    </h1>
    <p class="text-lg sm:text-xl mb-8">Sistem Manajemen Inventaris Fakultas Teknik Informatika</p>
    
    <a href="{{ route('auth.page') }}">
      <button class="bg-white text-blue-700 font-semibold py-2 px-6 rounded-lg hover:bg-yellow-300 transition duration-300" type="button" aria-label="Join Now">
        Join Now!
      </button>
    </a>
  </div>

</body>
<body class="bg-gray-100 pt-20">
    @include('components.navbar')
</body>
</html>
