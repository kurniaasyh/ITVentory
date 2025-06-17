{{-- resources/views/admin/dashboard.blade.php --}}
@extends('layouts.admin')

@section('content')
<h2 class="text-2xl font-bold mb-6">Welcome, Admin</h2>
<p>Total Inventory: {{ $totalItems }}</p>
@endsection
