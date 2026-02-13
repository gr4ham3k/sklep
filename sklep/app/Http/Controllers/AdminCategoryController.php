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

    public function remove(Category $category)
    {
        if($category->product()->exists())
        {
            return back()->with('error','Nie można usunąc kategorii, która zawiera produkty.');
        }

        $category->delete();
        return back()->with('Success','Pomyślnie usunięto kategorię!');
    }

    public function edit(Category $category)
    {
        return view('pages.admin-categories-edit',compact('category'));
    }

    public function update(Request $request,Category $category)
    {
        $request->validate([
            'name' => 'required|string|min:1|max:255',
            'slug' => 'required|string|min:1|max:255',
        ]);

        $category->update([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);

        return back();
        
    }
}
