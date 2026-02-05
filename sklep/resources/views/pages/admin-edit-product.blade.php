@extends('layouts.layout')

@push('styles')
    <link href="{{ asset('css/admin-product-edit.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="admin-product-edit">
        @if($product->image->isNotEmpty())
            <img src="{{ asset('storage/'.$product->image->first()->image_path) }}" alt="{{ $product->image->first()->alt_text }}">
        @endif
        <form id="edit-product-form" action="{{ route('products.update',$product) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" value="{{ $product->name }}">
            <input type="text" value="{{ $product->slug }}">
            <textarea>{{ $product->description }}</textarea>
            <input type="number" value="{{ $product->price }}">
            <input type="number" value="{{ $product->sale_price }}">
            <input type="date" value="{{ $product->sale_start }}">
            <input type="date" value="{{ $product->sale_end }}">
            <input type="number" value="{{ $product->stock_quantity }}">
        </form>
        <div class="edit-product-btns">
            <button type="submit" form="edit-product-form">Zapisz zmiany</button>
            <a href="{{ route('products.index') }}">Anuluj</a>
        </div>
    </div>
@endsection