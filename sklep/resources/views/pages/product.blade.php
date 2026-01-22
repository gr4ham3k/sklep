@extends('layouts.layout')

@section('content')
    <div class="product">
        <div class="product-left">
            <p class="product-name">{{ $product->name }}lollollollollollollollollollollollollollollollollollollollol</p>
            <img src="{{ asset('storage/'.$product->image->first()->image_path) }}" alt="{{ $product->image->first()->alt_text }}">
        </div>
        <div class="product-right">
            <div class="d1">

            </div>
            <div class="d2">
                <div class="d2-left">
                    <span class="product-price"> {{ $product->price }} zł </span>
                </div>
                <div class="d2-right">
                    <span class="product-stock">{{ $product->stock_quantity }} sztuk</span>
                    <form method="POST" action="/cart">
                        @csrf
                        <input name="product_id" type="hidden" value="{{ $product->id }}">
                        <input name="quantity" type="number" value="1" min="1" max="{{ $product->stock_quantity }}">
                        <button class="buy-btn">Dodaj do koszyka</button>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
    <div class="description">
        <p>OPIS PRODUKTU</p>
        <span class="description-text"> {{ $product->description }} </span>
    </div>
@endsection