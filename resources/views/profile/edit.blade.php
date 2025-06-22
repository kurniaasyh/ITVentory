@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">

    <div class="profile-container">
        <h2>{{ Auth::user()->role === 'admin' ? 'Admin Profile Settings' : 'User Profile Settings' }}</h2>
        <p class="description">Update your profile information below</p>

        @if (session('status') === 'profile-updated')
            <div class="alert-success">
                {{ __('Profile updated successfully.') }}
            </div>
        @endif

        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('patch')

            <div class="profile-form-group">
                <label for="name">Full Name</label>
                <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required>
            </div>

            <div class="profile-form-group">
                <label for="email">Email Address</label>
                <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required>
            </div>

            @if (Auth::user()->role !== 'admin')
                <div class="profile-form-group">
                    <label for="nim">NIM</label>
                    <input id="nim" name="nim" type="text" value="{{ old('nim', $user->nim) }}">
                </div>
            @endif

            <div class="profile-form-group">
                <label for="whatsapp">WhatsApp Number</label>
                <input id="whatsapp" name="whatsapp" type="text" value="{{ old('whatsapp', $user->whatsapp) }}">
            </div>

            <div class="profile-form-group">
                <label for="address">Address</label>
                <textarea id="address" name="address" rows="3">{{ old('address', $user->address) }}</textarea>
            </div>

            <div class="profile-submit">
                <button type="submit">Save Changes</button>
            </div>
        </form>
    </div>
@endsection
