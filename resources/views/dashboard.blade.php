@extends('layouts.main')
@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <div class="card" style="margin-top:40px;">
        <h2 style="margin-bottom: 20px;"><b>List Of Inventory</b></h2>
        <table border="1">
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
                            <span class="badge {{ strtolower($item->status) }}">
                                {{ $item->status }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
