<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login & Register - ITVentory</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

  <div class="bg-white shadow-lg rounded-lg w-full max-w-4xl flex overflow-hidden">
    <!-- Left side -->
    <div class="w-1/2 bg-blue-600 text-white p-10 flex flex-col justify-center">
      <h1 class="text-3xl font-bold mb-4">Selamat Datang di ITVentory</h1>
      <p>Sistem Manajemen Inventaris</p>
    </div>

    <!-- Right side -->
    <div class="w-1/2 p-10">
      <div class="flex justify-between mb-6">
        <button onclick="showForm('login')" class="text-blue-600 font-semibold">Login</button>
        <button onclick="showForm('register')" class="text-gray-500 hover:text-blue-600">Register</button>
      </div>

      <!-- Error Display -->
      @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
          <ul class="list-disc list-inside text-sm">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <!-- Login Form -->
      <form id="login-form" method="POST" action="{{ route('login') }}">
        @csrf
        <input type="email" name="email" placeholder="Email" class="w-full mb-4 p-2 border rounded" required />
        <input type="password" name="password" placeholder="Password" class="w-full mb-4 p-2 border rounded" required />
        <button type="submit" class="bg-blue-600 text-white w-full p-2 rounded">Login</button>
      </form>

      <!-- Register Form -->
      <form id="register-form" method="POST" action="{{ route('register') }}" class="hidden">
        @csrf
        <input type="text" name="name" placeholder="Nama Lengkap" class="w-full mb-4 p-2 border rounded" required value="{{ old('name') }}" />
        <input type="text" name="nim" placeholder="NIM" class="w-full mb-4 p-2 border rounded" value="{{ old('nim') }}" />
        <input type="text" name="whatsapp" placeholder="No. WhatsApp" class="w-full mb-4 p-2 border rounded" value="{{ old('whatsapp') }}" />
        <textarea name="address" placeholder="Alamat" class="w-full mb-4 p-2 border rounded">{{ old('address') }}</textarea>
        <input type="email" name="email" placeholder="Email" class="w-full mb-4 p-2 border rounded" required value="{{ old('email') }}" />
        <input type="password" name="password" id="reg-password" placeholder="Password" class="w-full mb-1 p-2 border rounded" required />
          <p id="password-error" class="text-sm text-red-600 mb-3 hidden">Password harus minimal 8 karakter.</p>
        <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" class="w-full mb-4 p-2 border rounded" required />
        <button type="submit" class="bg-green-600 text-white w-full p-2 rounded">Register</button>
      </form>
    </div>
  </div>

  <!-- Script show/hide form -->
  <script>
    function showForm(type) {
      document.getElementById('login-form').style.display = type === 'login' ? 'block' : 'none';
      document.getElementById('register-form').style.display = type === 'register' ? 'block' : 'none';
    }
  </script>

  <!-- Blade logic to open form based on validation error -->
  <script>
    window.onload = function () {
      @if ($errors->any())
        showForm('register');
      @else
        showForm('login');
      @endif
    }
  </script>

</body>
<script>
  const passwordInput = document.getElementById('reg-password');
  const passwordError = document.getElementById('password-error');

  passwordInput.addEventListener('input', function () {
    if (this.value.length > 0 && this.value.length < 8) {
      passwordError.classList.remove('hidden'); // Tampilkan pesan
    } else {
      passwordError.classList.add('hidden'); // Sembunyikan jika valid
    }
  });
</script>

</html>
