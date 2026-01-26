@extends('layouts.layout')

@section('content')
    <div class="cart-title">
        <span>KOSZYK</span>
    </div>
    <div class="cart-div">
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
                        <span>
                            <form action="{{ route('cart.update', $item->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input
                                    type="number"
                                    name="quantity"
                                    value="{{ $item->quantity }}" 
                                    min="1" 
                                    max="{{ $item->product->stock_quantity }}"
                                    onchange="this.form.submit()"
                                >
                            </form>
                        </span>
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
        <div class="total-div">
            <span id="total">Łącznie: {{ $total }} zł</span>
        </div>
        <div class="cart-checkout">
            <form action="/order" method="POST">
                @csrf
                <input type="text" name="name" placeholder="Imię">
                <input type="text" name="surnname" placeholder="Nazwisko">
                <input type="text" name="city" placeholder="Miasto">
                <input type="text" name="street" placeholder="Ulica">
                <input type="text" name="postcode" placeholder="Kod pocztowy">
                <input type="text" name="apartment-number" placeholder="Numer mieszkania" optional>
                <button>ZAMÓW</button>
            </form>
        </div>
    </div>
@endsection