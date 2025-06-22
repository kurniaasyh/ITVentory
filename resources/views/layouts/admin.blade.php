<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin - ITVentory</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom right, #f5faff, #cdddfc);
        }

        .sidebar {
            width: 200px;
            height: 100vh;
            background: linear-gradient(to left, #4a5cff, #90adff);
            padding: 20px;
            float: left;
        }

        .sidebar a {
            display: block;
            margin: 20px 0;
            color: #333;
            text-decoration: none;
            font-weight: bold;
        }

        .sidebar a.active {
            color: #0a3d91;
        }

        .topbar {
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .container {
            margin-left: 220px;
            padding: 20px;
        }

        .card {
            background: #fff;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.2);
            margin-top: 40px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ccc;
        }

        th,
        td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ccc;
        }

        .badge {
            padding: 5px 10px;
            border-radius: 10px;
            color: white;
        }

        .tersedia {
            background-color: #4dabf7;
        }

        .kosong {
            background-color: #e03131;
        }

        button {
            padding: 6px 14px;
            border: none;
            background-color: #4f46e5;
            color: white;
            font-weight: bold;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #3730a3;
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <h2><span style="color:#052950">IT</span><span style="color:#ffc107">Ventory</span></h2>
        <a href="{{ route('admin.dashboard') }}"
            class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">Dashboard</a>
        <a href="{{ route('admin.inventories.index') }}"
            class="{{ request()->is('admin/inventories*') ? 'active' : '' }}">Management</a>
        <a href="{{ route('admin.approvals') }}"
            class="{{ request()->is('admin/approvals') ? 'active' : '' }}">Persetujuan</a>
    </div>

    <div class="container">
        <div class="topbar">
            <div><b>Admin Panel</b></div>
            <div style="display: flex; align-items: center; gap: 12px;">
                <!-- 🔔 Notifikasi -->
                <a href="{{ route('admin.notifications') }}" style="position: relative; text-decoration: none;">
                    <span style="font-size: 20px;">🔔</span>
                    @php
                        use App\Models\Notification;
                        $notifCount = Notification::where('role_tujuan', 'admin')->where('is_read', false)->count();
                    @endphp
                    @if ($notifCount > 0)
                        <span
                            style="position: absolute; top: -8px; right: -8px; background: red; color: white; border-radius: 50%; padding: 2px 6px; font-size: 12px;">
                            {{ $notifCount }}
                        </span>
                    @endif
                </a>

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
