@extends('layouts.layout')

@section('content')

@push('styles')
    <link href="{{ asset('css/cart.css') }}" rel="stylesheet">
@endpush

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
                @if ($cart && $cart->items->count())
                @foreach ($cart->items as $item)
                <tr>
                    <td>
                        <img src="{{ asset('storage/'.$item->product->image->image_path) }}" alt="{{ $item->product->image->alt_text }}">
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

                                @error('quantity_'.$item->id)
                                    <div style="color: red; font-size: 12px; margin-top: 4px;">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </form>
                        </span>
                    </td>
                    <td style="width: 5%; text-align: center;">
                        @if ($item->product->isOnSale())
                            <p>
                                <span class="old-price">{{ $item->product->price }}zł</span>
                                <span class="sale-price">{{ $item->product->sale_price }}zł</span>
                            </p>
                        @else
                            <p>{{ $item->product->price }} zł</p>
                        @endif
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
            @endif
            </tbody>
        </table>
        <div class="total-div">
            <span id="total">Łącznie: {{ $total }} zł</span>
        </div>
        <div class="cart-checkout">
            <form action="/order" method="POST">
                @csrf
                <input type="text" name="name" placeholder="Imię" required>
                <input type="text" name="surname" placeholder="Nazwisko" required>
                <input type="text" name="city" placeholder="Miasto" required>
                <input type="text" name="street" placeholder="Ulica" required>
                <input type="text" name="postcode" placeholder="Kod pocztowy" required>
                <input type="tel" name="telephone" placeholder="Telefon" required>
                <input type="text" name="house_number" placeholder="Numer domu" required>
                <input type="text" name="apartment_number" placeholder="Numer mieszkania" optional>
                <button>ZAMÓW</button>
            </form>
        </div>
    </div>
@endsection