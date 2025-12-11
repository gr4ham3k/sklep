@extends('layouts.layout')

@section('content')
    <div class="cart-title">
        <span>KOSZYK</span>
    </div>
    <div class="cart-div">
        <form action="" method="POST">
        <table style="width:100%">
            <thead>
                <th></th>
                <th style="text-align: left; padding-left: 20px;">Produkt</th>
                <th>Ilosc</th>
                <th>Cena</th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($cart->items as $item)
                <tr>
                    <td>
                        <img src="{{ asset('storage/'.$item->product->image->first()->image_path) }}" alt="{{ $item->product->image->first()->alt_text }}">
                    </td>
                    <td style="width: 70%; padding-left: 20px;">
                        <span>{{ $item->product->name }}</span>
                    </td>
                    <td style="width: 15%; text-align: center;">
                        <span>{{ $item->quantity }}</span>
                    </td>
                    <td style="width: 5%; text-align: center;">
                        <span>{{ $item->product->price }} zł</span>
                    </td>
                    <td>
                        <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button>🗑️</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="cart-checkout">
            <span>Łącznie: {{ $total }} zł</span>
            <input type="hidden" value="{{ $total }}">
            <button>ZAMÓW</button>
        </div>
        </form>
    </div>
@endsection