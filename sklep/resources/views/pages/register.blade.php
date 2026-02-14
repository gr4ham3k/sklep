@extends('layouts.layout')

@section('content')

@push('styles')
    <link href="{{ asset('css/register.css') }}" rel="stylesheet">
@endpush

    <div class="auth-page">
            <p>REJESTRACJA</p>
            <form method="POST" action="/register">
                @csrf
                <input type="text" name="username" placeholder="Nazwa użytkownika" maxlength="20">
                <input type="email" name="email" placeholder="Email" maxlength="50">
                <input type="password" name="password" placeholder="Hasło" maxlength="30">
                <input type="password" name="password_confirmation" placeholder="Powtórz hasło" maxlength="30">
                <button class="register-btn">Zarejestruj się</button>
            </form>
            @if ($errors->any())
            <div class="register-errors">
                <ul>
                    @foreach ($errors->all() as $err)
                        <li style="color:red">{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif  
    </div>
@endsection