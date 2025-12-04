<?php

    namespace App\Http\Controllers;

    use App\Models\User;

    use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

    class LoginController extends Controller
    {
        public function show()
        {
            return view('pages.login');
        }

        public function login(Request $request)
        {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);

            $credentials = $request->only('email','password');

            if(Auth::attempt($credentials))
            {
                $request->session()->regenerate();
                return redirect()->intended('/');
            }

            return back()->withErrors([
                'email' => 'Nieprawidłowy email lub hasło.'
            ])->onlyInput('email');
        }
    }
?>