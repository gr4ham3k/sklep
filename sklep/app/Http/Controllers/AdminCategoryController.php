<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('pages.admin-categories',compact('categories'));
    }

    public function insert(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:1|max:255',
            'slug' => 'required|string|min:1|max:255',
        ]);

        $category = Category::create([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);

        return back()->with('Success','Pomyślnie dodano kategorię!');
    }
}
