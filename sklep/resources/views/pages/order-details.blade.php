@extends('layouts.layout')

@push('styles')
    <link href="{{ asset('css/order-details.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="order-details">
        <div class="order-details-title">
            <span>ZAM-{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</span>
        </div>
        <div class="order-details-table">
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
                        <img src="{{ asset('storage/'.$item->product->image->first()->image_path) }}"
                            alt="{{ $item->product->image->first()->alt_text }}">
                    </td>

                    <td>{{ $item->product->name }}</td>

                    <td>{{ $item->quantity }}</td>

                    <td>{{ $item->product->finalPrice() }}zł</td>

                </tr>
                @endforeach
            </tbody>
        </table>  
        </div>  
    </div>
@endsection