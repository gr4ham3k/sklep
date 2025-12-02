<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Strona główna</title>
    <link href="{{ asset('css/layout.css') }}" rel="stylesheet">
    <link href="{{ asset('css/content.css') }}" rel="stylesheet">
    <link href="{{ asset('css/product.css') }}" rel="stylesheet">
    <link href="{{ asset('css/register.css') }}" rel="stylesheet">
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
                    <div class="cart">Koszyk</div> 
                    <div class="login">Zaloguj się</div> 
                    <div class="register">
                        <a href="/register" class="header-link">Zarejestruj się</a>
                    </div> 
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