<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ITVentory</title>
    <style>
        body { margin: 0; font-family: Arial, sans-serif; background: linear-gradient(to bottom right, #f5faff, #cdddfc); }
        .sidebar { width: 200px; height: 100vh; background: #dce7fb; padding: 20px; float: left; }
        .sidebar a { display: block; margin: 20px 0; color: #333; text-decoration: none; font-weight: bold; }
        .sidebar a.active { color: #0a3d91; }
        .topbar { padding: 20px; display: flex; justify-content: space-between; align-items: center; }
        .container { margin-left: 220px; padding: 20px; }
        .card { background: #fff; padding: 20px; border-radius: 15px; box-shadow: 5px 5px 15px rgba(0,0,0,0.2); }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 12px; text-align: center; }
        .badge { padding: 5px 10px; border-radius: 10px; color: white; }
        .tersedia { background-color: #4dabf7; }
        .kosong { background-color: #e03131; }
    </style>
</head>
<body>

<div class="sidebar">
    <h2><span style="color:#007bff">IT</span>Ventory</h2>
    <a href="{{ route('dashboard') }}" class="{{ request()->is('dashboard') ? 'active' : '' }}">Dashboard</a>
    <a href="{{ route('loan-form') }}" class="{{ request()->is('loan-form') ? 'active' : '' }}">Loan Form</a>
    <a href="{{ route('helpdesk') }}" class="{{ request()->is('helpdesk') ? 'active' : '' }}">Helpdesk</a>
</div>

<div class="container">
    <div class="topbar">
        <div></div>
        <div>
            <span>{{ Auth::user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>
    </div>

    @yield('content')
</div>

</body>
</html>
