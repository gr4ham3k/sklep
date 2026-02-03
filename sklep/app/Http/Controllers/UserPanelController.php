<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserPanelController extends Controller
{
    public function show()
    {
        return view('pages.user-panel');
    }
}
