<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserPanelController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('pages.user-panel',compact('user'));
    }

    public function editUsername(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:50|unique:users,username,'.Auth::id(),
        ]);

        $user=Auth::user();
        $user->username = $request->username;
        $user->save();
        return back()->with('Success','Nazwa użytkownika została zmieniona!');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|confirmed|min:8',
        ]);

        $user = Auth::user();

        if(!Hash::check($request->current_password, $user->password))
        {
            return back()->withErrors(['current_password' => 'Nieprawidłowe stare hasło!']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('status', 'Hasło zostało zmienione pomyślnie.');
    }
}
