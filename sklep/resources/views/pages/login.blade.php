@extends('layouts.layout')

@push('styles')
    <link href="{{ asset('css/register.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="auth-page">
            <p>LOGOWANIE</p>
            <form method="POST" action="/login">
                @csrf
                <input type="email" name="email" placeholder="Email" maxlength="50">
                <input type="password" name="password" placeholder="Hasło" maxlength="30">
                <button class="login-btn">Zaloguj się</button>
            </form>
            @if ($errors->any())
            <div class="login-errors">
                <ul>
                    @foreach ($errors->all() as $err)
                        <li style="color:red">{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
            @endif  
            <div class="forgot-password">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        Nie pamiętasz hasła?
                    </a>
                @endif
            </div>
    </div>
@endsection