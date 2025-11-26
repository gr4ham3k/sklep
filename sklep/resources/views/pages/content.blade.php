@extends('layouts.layout')

@section('content')
        
<div class="content">
    <div class="categories">
        <p>Kategorie produktów</p>
        @foreach ($categories as $category)
            <p>{{ $category->name }}</p>
        @endforeach
    </div>
    <div class="products">
        @foreach ($products as $product)
        <a href="{{ '/'.$product->category->slug.'/'.$product->slug }}" class="single-product-link">
            <div class="single-product">
                @if ($product->image->isNotEmpty())
                    <img src="{{ asset('storage/'.$product->image->first()->image_path) }}" 
                    alt="{{ $product->image->first()->alt_text }}">
                @endif
                <p>{{ $product->name }}</p>
                <p>{{ $product->price }} zł</p>
            </div>
        </a>     
        @endforeach
    </div>
</div>

@endsection

