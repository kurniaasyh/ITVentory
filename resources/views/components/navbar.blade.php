
<nav style="display: flex; justify-content: space-between; align-items: center; padding: 10px 20px; background-color: #fff; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
    <div style="font-weight: bold; font-size: 24px; color: #007bff;">ITVentory</div>

    <div>
        <a href="{{ url('/') }}" style="margin-right: 15px; color: #333; text-decoration: none;">Home</a>
        <a href="{{ url('/contact') }}" style="margin-right: 15px; color: #333; text-decoration: none;">Contact</a>
        <a href="{{ url('/about') }}" style="margin-right: 15px; color: #333; text-decoration: none;">About</a>
        <a href="{{ url('/login') }}" style="padding: 8px 16px; background-color: #007bff; color: white; border-radius: 5px; text-decoration: none;">Login</a>
        <a href="{{ url('/register') }}" style="padding: 8px 16px; background-color: #007bff; color: white; border-radius: 5px; text-decoration: none;">Register</a>
    </div>
</nav>
