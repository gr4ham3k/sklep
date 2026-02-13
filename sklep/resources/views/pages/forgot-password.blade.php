@extends('layouts.layout')

@push('styles')
    <link href="{{ asset('css/forgot-password.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="forgot-password">
        <h2>Wyślij email do resetu hasła</h2>
        @if (session('status'))
            <div class="login-success" style="color:green; margin-bottom:10px;">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('password.email') }}" method="POST">
            @csrf
            <input type="email" name="email" placeholder="Email" maxlength="50" required>
            <button>Wyślij</button>
        </form>
        <div class="forgot-password" style="margin-top:10px; text-align:center;">
            <a href="{{ route('login') }}">Powrót do logowania</a>
        </div>
    </div>
@endsection