@extends('layouts.layout')

@section('content')

@push('styles')
    <link href="{{ asset('css/orders.css') }}" rel="stylesheet">
@endpush

<div class="orders-div">
    <div class="orders-title">
        <span>ZAMÓWIENIA</span>
    </div>
    <div class="orders-table">
        <table style="width:100%">
            <thead>
                <th>Numer zamówienia</th>
                <th>Data</th>
                <th>Łączna kwota</th>
                <th>Status</th>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td>ZAM-{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</td>
                    <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>
                    <td>{{ $order->total }}zł</td>
                    <td>
                        {{ __('statuses.'.$order->status) }}
                    </td>
                    <td>
                        <a href="/orders/{{ $order->id }}">
                            Szczegóły
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection