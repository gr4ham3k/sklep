@extends('layouts.layout')

@push('styles')
    <link href="{{ asset('css/admin-products.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="admin-products">
        <a class="admin-add-product" href="{{ route('products.add') }}">
            <div>
                Dodaj produkt
            </div>
        </a>
        <table>
            <thead>
                <th></th>
                <th>ID</th>
                <th>NAZWA</th>
                <th>CENA</th>
                <th>ILOŚĆ</th>
            </thead>
            <tbody>
            @foreach ($products as $product)
                <tr>
                    @if ($product->image)
                        <td>
                            <img src="{{ asset('storage/'.$product->image->image_path) }}" alt="{{ $product->image->alt_text }}">
                        </td>
                    @endif
                    
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->finalPrice() }}zł</td>
                    <td>{{ $product->stock_quantity }}</td>
                    <td>
                        <a href="{{ route('products.edit',$product->id) }}">Edytuj</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection