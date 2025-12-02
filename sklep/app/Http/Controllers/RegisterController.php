<?php

    namespace App\Http\Controllers;

    use App\Models\User;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Hash;

    class RegisterController extends Controller
    {
        public function show()
        {
            return view('pages.register');
        }

        public function register(Request $request)
        {
            $request->validate([
                'username' => 'required|string|min:4|max:20',
                'email' => 'required|email|unique:users,email|max:50',
                'password' => 'required|string|min:6|confirmed'
            ]);

            $user = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);


            return redirect('/')->with('success','Rejestracja zakończona!');
        }
    }

?>