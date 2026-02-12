@extends('layouts.layout')

@push('styles')
    <link href="{{ asset('css/admin-product-edit.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="admin-product-edit">
        @if($product->image)
            <img src="{{ asset('storage/'.$product->image->image_path) }}" alt="{{ $product->image->alt_text }}">
        @endif
        <form id="edit-product-form" action="{{ route('products.update',$product) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="name">Nazwa<label>
            <input type="text" value="{{ $product->name }}" name="name">

            <label for="slug">Slug<label>
            <input type="text" value="{{ $product->slug }}" name="slug">
            
            <label for="description">Opis<label>
            <textarea name="description">{{ $product->description }}</textarea>
            
            <label for="price">Cena<label>
            <input type="number" step="0.01" value="{{ $product->price }}" name="price">
            
            <label for="sale_price">Cena po przecenie<label>
            <input type="number" step="0.01" value="{{ $product->sale_price }}" name="sale_price">
            
            <label for="sale_start">Początek promocji<label>
            <input type="datetime-local" value="{{ $product->sale_start }}" name="sale_start">
            
            <label for="sale_end">Koniec promocji<label>
            <input type="datetime-local" value="{{ $product->sale_end }}" name="sale_end">
            
            <label for="stock_quantity">Ilość<label>
            <input type="number" value="{{ $product->stock_quantity }}" name="stock_quantity">

            <label for="image">Dodaj zdjęcie<label>
            <input type="file" name="image">

            <label for="category_id">Kategoria<label>
            <select name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}</option>
                @endforeach
            </select>
            
        </form>
        <div class="edit-product-btns">
            <button type="submit" form="edit-product-form">Zapisz zmiany</button>
            <a href="{{ route('products.index') }}">Anuluj</a>
        </div>
        <form action="{{ route('products.remove',$product) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Usuń</button>
        </form>
    </div>
@endsection