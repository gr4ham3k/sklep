<?php

return [
    'required' => 'Pole :attribute jest wymagane.',
    'email' => 'Pole :attribute musi być poprawnym adresem email.',
    'unique' => 'Pole :attribute już istnieje w bazie.',
    'confirmed' => 'Hasła się nie zgadzają.',
    'regex' => 'Hasło musi zawierać przynajmniej jedną literę i cyfrę.',
    'min' => [
        'string' => 'Pole :attribute musi mieć co najmniej :min znaków.',
    ],
    'max' => [
        'string' => 'Pole :attribute nie może być dłuższe niż :max znaków.',
    ],
    'attributes' => [
        'username' => 'nazwa użytkownika',
        'email' => 'email',
        'password' => 'hasło',
    ],
];
