@extends('layouts.layout')

@push('styles')
    <link href="{{ asset('css/user-panel.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="user-panel">
        <h2>Moje konto</h2>
        <div class="change-username">
            <p>Zmień nazwę użytkownika</p>
            <form action="{{ route('account.editUsername') }}" method="POST">
                @csrf
                @method('PUT')
                <label for="username">
                <input type="text" name="username" value="{{ $user->username }}">
                <button type="submit">Zapisz</button>
            </form>
        </div>
        <div class="change-password">
            <p>Zmień hasło</p>
            <form action="{{ route('account.changePassword') }}" method="POST">
                @csrf
                @method('PUT')
                <label for="current_password">
                <input type="password" name="current_password" placeholder="Stare hasło">

                <label for="password">
                <input type="password" name="password" placeholder="Nowe hasło">

                <label for="password_confirmation">
                <input type="password" name="password_confirmation" placeholder="Powtórz hasło">

                <button type="submit">Zapisz</button>
            </form>
        </div>
    </div>
@endsection