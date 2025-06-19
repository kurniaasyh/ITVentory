<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ITVentory</title>
    <style>
        body { margin: 0; font-family: Arial, sans-serif; background: linear-gradient(to bottom right, #f5faff, #cdddfc); }
        .sidebar { width: 200px; height: 100vh; background: linear-gradient(to left, #4a5cff, #90adff); padding: 20px; float: left; }
        .sidebar a { display: block; margin: 20px 0; color: #333; text-decoration: none; font-weight: bold; }
        .sidebar a.active { color: #0a3d91; }
        .topbar { padding: 20px; display: flex; justify-content: space-between; align-items: center; }
        .container { margin-left: 220px; padding: 20px; }
        .card { background: #fff; padding: 20px; border-radius: 15px; box-shadow: 5px 5px 15px rgba(0,0,0,0.2); margin-top: 40px; }
        table { width: 100%; border-collapse: collapse; border: 1px solid #ccc; }
        th, td { padding: 12px; text-align: center; border: 1px solid #ccc; }
        .badge { padding: 5px 10px; border-radius: 10px; color: white; }
        .tersedia { background-color: #4dabf7; }
        .kosong { background-color: #e03131; }
        button {
            padding: 5px 10px;
            border-radius: 6px;
            border: none;
            background-color: #333;
            color: #fff;
            cursor: pointer;
        }
        button:hover {
            background-color: #111;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h2><span style="color:#052950">IT</span><span style="color:#ffc107">Ventory</span></h2>

    @php $user = Auth::user(); @endphp

    @if ($user->role === 'admin')
        <a href="{{ route('admin.dashboard') }}" class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">Dashboard</a>
        <a href="{{ route('admin.inventories.index') }}" class="{{ request()->is('admin/inventories*') ? 'active' : '' }}">Management</a>
    @else
        <a href="{{ route('dashboard') }}" class="{{ request()->is('dashboard') ? 'active' : '' }}">Dashboard</a>
        <a href="{{ route('loans.create') }}" class="{{ request()->is('loans/create') ? 'active' : '' }}">Loan Form</a>
        <a href="{{ route('loans.returns') }}" class="{{ request()->is('loans/returns') ? 'active' : '' }}">Pengembalian</a>
        <a href="{{ route('helpdesk') }}" class="{{ request()->is('helpdesk') ? 'active' : '' }}">Helpdesk</a>
        <a href="{{ route('history.index') }}" class="{{ request()->is('history') ? 'active' : '' }}">History</a>
    @endif
</div>

<div class="container">
    <div class="topbar">
        <div></div>
        <div style="display: flex; align-items: center; gap: 8px;">
            <span>{{ Auth::user()->name }}</span>
            <form action="{{ route('profile.edit') }}" method="GET" style="display:inline;">
                <button type="submit">Profile</button>
            </form>
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
