@extends('layouts.layout')

@push('styles')
    <link href="{{ asset('css/admin-categories.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="admin-categories">
        @if (session('error'))
            <div class="alert-error">
                {{ session('error') }}
            </div>
        @endif
        <h2>Kategorie</h2>
        <form action="{{ route('categories.insert') }}" method="POST">
            @csrf
            <label for="name">Nazwa</label>
            <input type="text" name="name">

            <label for="slug">Slug</label>
            <input type="text" name="slug">

            <button type="submit">Dodaj</button>
        </form>
        <table>
            <thead>
                <th>Nazwa</th>
                <th>Slug</th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
                    <td>
                        <a href="{{ route('categories.edit',$category) }}">Edytuj</a>
                    </td>
                    <td>
                        <form action="{{ route('categories.remove',$category) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Usuń</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection