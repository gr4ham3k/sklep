# Projekt Sklep Laravel

To jest prosty sklep internetowy stworzony w Laravel z wykorzystaniem bazy danych PostgreSQL. Projekt zawiera system użytkowników, koszyk, zamówienia, płatności i wysyłki.

---

## Wymagania

- PHP >= 8.1
- Composer
- PostgreSQL
- Laravel 10
- Node.js + npm (jeśli używasz frontendowych zależności)

---

## Instalacja

1. Sklonuj repozytorium:
   git clone <TWÓJ_LINK_DO_REPO>
   cd <Nazwa_Folderu_Projektu>

2.Zainstaluj zależności PHP:
   composer install

3. Skopiuj plik .env.example do .env i ustaw dane do bazy danych PostgreSQL:
   DB_CONNECTION=pgsql
   DB_HOST=127.0.0.1
   DB_PORT=5432
   DB_DATABASE=twoja_baza
   DB_USERNAME=twoj_uzytkownik
   DB_PASSWORD=twoje_haslo

4. Utwórz bazę danych w PostgreSQL:
   CREATE DATABASE twoja_baza;
   
6. Zaimportuj plik SQL do bazy danych.
7. Wygeneruj klucz aplikacji Laravel:
   php artisan key:generate

7. Uruchom serwer deweloperski:
   php artisan serve
   
9. Aplikacja powinna być dostępna pod adresem: http://127.0.0.1:8000

