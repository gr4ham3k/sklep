@extends('layouts.layout')

@push('styles')
    <link href="{{ asset('css/admin-orders.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="admin-orders">
        <h2>Zamówienia</h2>
        <table>
            <thead>
                <th>ID</th>
                <th>Data</th>
                <th>Email</th>
                <th>Telefon</th>
                <th>Miasto</th>
                <th>Ulica</th>
                <th>Kod pocztowy</th>
                <th>Numer domu</th>
                <th>Numer mieszkania</th>
                <th>Łącznie</th>
                <th>Status</th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr class="
                        {{ $order->status === 'completed' ? 'order-completed' : '' }}
                        {{ $order->status === 'cancelled' ? 'order-cancelled' : '' }}
                        {{ $order->status === 'pending' ? 'order-pending' : '' }}">
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>
                        <td>{{ $order->user->email }}</td>
                        <td>{{ $order->address->phone }}</td>
                        <td>{{ $order->address->city }}</td>
                        <td>{{ $order->address->street }}</td>
                        <td>{{ $order->address->postcode }}</td>
                        <td>{{ $order->address->house_number }}</td>
                        <td>{{ $order->address->apartment_number }}</td>
                        <td>{{ $order->total }}zł</td>
                        <td>
                            <form action="{{ route('order.updateStatus',$order) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <select name="status" class="status-select">
                                    @foreach (['pending','completed','cancelled'] as $status)
                                        <option value="{{ $status }}" 
                                            {{ $order->status === $status ? 'selected' : '' }}>
                                            {{ __('statuses.'.$status) }}
                                        </option>
                                    @endforeach
                                </select>
                            </form>
                        </td>
                        <td><a href="{{ route('order.show',$order) }}">Szczegóły</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        document.querySelectorAll('.status-select').forEach(select => {
            select.addEventListener('change', function() {
                this.closest('form').submit();
            });
        });
    </script>

@endsection