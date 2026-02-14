@extends('layouts.layout')

@push('styles')
    <link href="{{ asset('css/admin-products.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="admin-products">
    <h2>Produkty</h2>

    @if (session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <div class="admin-products-top">
        <a class="admin-add-product" href="{{ route('products.add') }}">
            ➕ Dodaj produkt
        </a>
    </div>

    <div class="admin-products-table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>Obraz</th>
                    <th>ID</th>
                    <th>Nazwa</th>
                    <th>Cena</th>
                    <th>Ilość</th>
                    <th>Akcje</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>
                        @if ($product->image)
                            <img src="{{ asset('storage/'.$product->image->image_path) }}" 
                                 alt="{{ $product->image->alt_text }}">
                        @endif
                    </td>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->finalPrice() }} zł</td>
                    <td>{{ $product->stock_quantity }}</td>
                    <td>
                        <a class="edit-btn" href="{{ route('products.edit',$product->id) }}">Edytuj</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
