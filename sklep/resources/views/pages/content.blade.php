@extends('layouts.layout')

@section('content')

@push('styles')
    <link href="{{ asset('css/content.css') }}" rel="stylesheet">
@endpush
        
<div class="content">
    <div class="categories">
        <p>Kategorie produktów</p>
        <a href="/">Pokaż wszystko</a>
        @foreach ($categories as $category)
            <a href="/category/{{ $category->slug }}">{{ $category->name }}</a>
        @endforeach
    </div>
    <div class="products">
        @foreach ($products as $product)
        <a href="/products/{{ $product->category->slug.'/'.$product->slug }}" class="single-product-link">
            <div class="single-product">
                @if ($product->image)
                    <img src="{{ asset('storage/'.$product->image->image_path) }}" 
                    alt="{{ $product->image->alt_text }}">
                @endif
                @if ($product->isOnSale())
                    <p>
                        <span class="old-price">{{ $product->price }}zł</span>
                        <span class="sale-price">{{ $product->sale_price }}zł</span>
                    </p>
                @else
                    <p>{{ $product->price }} zł</p>
                @endif
                <p>{{ $product->name }}</p>
                
            </div>
        </a>     
        @endforeach
    </div>
</div>

@endsection

