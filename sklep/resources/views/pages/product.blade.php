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
                    <button class="buy-btn">Dodaj do koszyka</button>
                </div>
            </div>
            
        </div>
    </div>
    <div class="description">
        <p>OPIS PRODUKTU</p>
        <span class="description-text"> {{ $product->description }} </span>
    </div>
@endsection