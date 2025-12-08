@extends('layouts.layout')

@section('content')
    <div class="cart-div">
        @foreach ($cart->items as $item)
            <p>{{ $item->product->name }} Ilosc: {{ $item->quantity }}</p>
        @endforeach
    </div>
@endsection