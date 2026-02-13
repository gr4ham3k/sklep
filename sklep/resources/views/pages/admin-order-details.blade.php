@extends('layouts.layout')

@push('styles')
    <link href="{{ asset('css/admin-order-details.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="admin-order-details">
        <h2>Zamówienie {{ $order->id }}</h2>
        <table>
            <thead>
                <th></th>
                <th>Nazwa</th>
                <th>Ilość</th>
                <th>Cena</th>
            </thead>
            <tbody>
                @foreach ($order->items as $item)
                    <tr>
                        <td>
                            @if($item->product->image)
                                <img src="{{ asset('storage/'.$item->product->image->image_path) }}" 
                                        alt="{{ $item->product->image->alt_text }}">
                            @endif
                        </td>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->price * $item->quantity }}zł</td>
                    </tr>
                @endforeach
            </tbody>
        <table>
@endsection