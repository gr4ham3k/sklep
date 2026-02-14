@extends('layouts.layout')

@push('styles')
    <link href="{{ asset('css/admin-panel.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="admin-panel">
    <a href="{{ route('products.index') }}" class="admin-card">
        <div class="icon">📦</div>
        <span>Produkty</span>
    </a>
    <a href="{{ route('categories.index') }}" class="admin-card">
        <div class="icon">🗂️</div>
        <span>Kategorie</span>
    </a>
    <a href="{{ route('orders.index') }}" class="admin-card">
        <div class="icon">📝</div>
        <span>Zamówienia</span>
    </a>
</div>
@endsection
