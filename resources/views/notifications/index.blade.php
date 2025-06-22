@extends('layouts.main') {{-- atau layout user kamu --}}

@section('content')
    <h2>Notifikasi Saya</h2>

    @if ($notifications->isEmpty())
        <p>Tidak ada notifikasi.</p>
    @else
        <ul>
            @foreach ($notifications as $notif)
                <li style="margin-bottom: 10px; border-bottom: 1px solid #ccc; padding-bottom: 5px;">
                    {{ $notif->message }}
                    <br>
                    <small>{{ $notif->created_at->diffForHumans() }}</small>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
