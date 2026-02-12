@extends('layouts.layout')

@section('content')

@push('styles')
    <link href="{{ asset('css/product.css') }}" rel="stylesheet">
@endpush

    <div class="product">
        <div class="product-left">
            <p class="product-name">{{ $product->name }}lollollollollollollollollollollollollollollollollollollollol</p>
            <img src="{{ asset('storage/'.$product->image->image_path) }}" alt="{{ $product->image->alt_text }}">
        </div>
        <div class="product-right">
            <div class="d1">

            </div>
            <div class="d2">
                <div class="d2-left">
                    @if ($product->isOnSale())
                        <span class="product-old-price"> {{ $product->price }} zł </span>
                        <span class="product-sale-price"> {{ $product->sale_price }} zł </span>
                    @else
                        <span class="product-price"> {{ $product->price }} zł </span>
                    @endif
                    
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