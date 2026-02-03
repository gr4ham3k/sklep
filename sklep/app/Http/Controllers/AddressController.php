<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:1|max:255',
            'surname' => 'required|string|min:1|max:255',
            'city' => 'required|string|min:1|max:255',
            'street' => 'required|string|min:1|max:255',
            'postcode' => 'required|string|',
            'telephone' => 'required|string|min:1|max:255',
            'apartment_number' => 'nullable|string|min:1|max:255',
        ]);

        Address::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'surname' => $request->surname,
            'city' => $request->city,
            'street' => $request->street,
            'postocde' => $request->postcode,
            'telephone' => $request->telephone,
            'apartment_number' => $request->apartment_number,
        ]);

        return back()->with('success',"Adres zapisany");
    }
}
