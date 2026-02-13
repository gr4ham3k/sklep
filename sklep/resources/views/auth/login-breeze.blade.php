@extends('layouts.layout')

@push('styles')
    <link href="{{ asset('css/register.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="register-div">
        <div class="register-form">
            <p>LOGOWANIE</p>
            <form method="POST" action="/login">
                @csrf
                <input type="email" name="email" placeholder="Email" maxlength="50" required>
                <input type="password" name="password" placeholder="Hasło" maxlength="30" required>
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
        </div>
    </div>
@endsection