@extends('layouts.main')
@section('content')

<div class="card">
    <h2 style="margin-bottom: 20px;"><b>List Of Inventory</b></h2>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Code</th>
                <th>Total</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($inventories as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->code }}</td>
                    <td>{{ $item->total }}</td>
                    <td>
                        <span class="badge {{ strtolower($item->status ?? 'tersedia') }}">
                            {{ $item->status ?? 'Tersedia' }}
                        </span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
