@extends('layouts.layout')

@section('content')
    <div class="register">
        <div class="register-form">
            <p>REJESTRACJA</p>
            <form method="POST" action="/register">
                @csrf
                <input type="text" name="username" placeholder="Nazwa użytkownika" maxlength="20" required>
                <input type="email" name="email" placeholder="Email" maxlength="50" required>
                <input type="password" name="password" placeholder="Hasło" maxlength="30" required>
                <input type="password" name="password_confirmation" placeholder="Powtórz hasło" maxlength="30" required>
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
    </div>
@endsection