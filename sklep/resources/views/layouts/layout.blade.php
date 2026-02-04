<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Strona główna</title>
    <link href="{{ asset('css/layout.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body>
    <div class="site">
        <header>
            <div class="header-div">
                <div class="header-left">
                    <div class="phone">+48 999 999 999</div> 
                    <div class="email">Email</div> 
                </div>
                <div class="header-right">
                    @auth
                        <div class="my-account">
                            <a href="/account" class="header-link">Moje konto ({{ Auth::user()->username }})</a>
                        </div>
                        <div class="orders">
                            <a href="/orders" class="header-link">Zamówienia</a>
                        </div> 
                        <div class="cart">
                            <a href="/cart" class="header-link">Koszyk</a>
                        </div> 
                        <div class="logout">
                            <form action="/logout" method="POST">
                                @csrf
                                <button class="logout-btn" type="submit">Wyloguj się</button>
                            </form>
                        </div> 
                    @endauth
                    @guest
                        <div class="login">
                        <a href="/login" class="header-link">Zaloguj się</a>
                    </div> 
                    <div class="register">
                        <a href="/register" class="header-link">Zarejestruj się</a>
                    </div> 
                    @endguest
                    
                </div>
            </div>
        </header>
        <nav>
            <div class="nav-div">
            <div class="logo">
                <a href="/">
                    <img src="{{ asset('images/LOGO.svg') }}" alt="Logo sklepu">
                </a>
            </div>
            </div>
        </nav>
        <main>
            @yield('content')
        </main>
        <footer>
            <div class="footer-div">
                <div class="footer-content">
                    Footer
                </div>
            </div>
        </footer>
    </div>
</body>
</html>