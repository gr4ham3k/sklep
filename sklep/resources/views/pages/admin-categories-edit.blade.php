@extends('layouts.layout')

@push('styles')
    <link href="{{ asset('css/admin-categories-edit.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="admin-categories-edit">
        <h2>Edytuj</h2>
        <form id="edit-category-form" action="{{ route('categories.update',$category) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="name">Nazwa</label>
            <input type="text" name="name" value="{{ $category->name }}">

            <label for="slug">Slug</label>
            <input type="text" name="slug" value="{{ $category->slug }}">
        </form>
        <div class="edit-category-btns">
            <button type="submit" form="edit-category-form">Zapisz zmiany</button>
            <a href="{{ route('categories.index') }}">Anuluj</a>
        </div>
        @if ($errors->any())
            <div class="error">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
    </div>
    
@endsection