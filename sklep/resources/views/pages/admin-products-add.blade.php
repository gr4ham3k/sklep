@extends('layouts.layout')

@push('styles')
    <link href="{{ asset('css/admin-products-add.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="admin-products-add">
        <h2>Dodaj produkt</h2>
        <form id="add-product-form" action="{{ route('products.insert') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="name">Nazwa<label>
            <input type="text" name="name">

            <label for="slug">Slug<label>
            <input type="text" name="slug">
            
            <label for="description">Opis<label>
            <textarea name="description"></textarea>
            
            <label for="price">Cena<label>
            <input type="number" step="0.01" name="price">
            
            <label for="sale_price">Cena po przecenie<label>
            <input type="number" step="0.01" name="sale_price">
            
            <label for="sale_start">Początek promocji<label>
            <input type="datetime-local" name="sale_start">
            
            <label for="sale_end">Koniec promocji<label>
            <input type="datetime-local" name="sale_end">
            
            <label for="stock_quantity">Ilość<label>
            <input type="number" name="stock_quantity">

            <label for="category_id">Kategoria<label>
            <select name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            <label for="image">Dodaj zdjęcie<label>
            <input type="file" name="image">

            <button type="submit">Dodaj</button>
        </form>
    </div>
    @if ($errors->any())
        <div class="errors">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
        </div>  
    @endif

@endsection