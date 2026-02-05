@extends('layouts.layout')

@push('styles')
    <link href="{{ asset('css/admin-panel.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="admin-panel">
        <a href="{{ route('products.index') }}">
            Produkty
        </a>
        <a href="{{ route('categories.index') }}">
            Kategorie
        </a>
        <a href="{{ route('users.index') }}">
            Użytkownicy
        </a>
        <a href="{{ route('orders.index') }}">
            Zamówienia
        </a>
    </div>
@endsection