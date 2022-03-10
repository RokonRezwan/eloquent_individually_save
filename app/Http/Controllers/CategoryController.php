<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class CategoryController extends Controller
{

    public function index()
    {
        $data['categories'] = Category::all();

        return view('categories.index', $data);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        //
    }

    public function update(Request $request, Category $category)
    {
        //
    }

    public function destroy(Category $category)
    {
        //
    }

    public function status(Category $category)
    {
        
        if ($category->is_active == 1) 
         {
            Category::where('id', $category->id)
                    ->update(['is_active' => 0]);
         }
        else 
         {
            Category::where('id', $category->id)
                    ->update(['is_active' => 1]);    
         }

         return redirect()->back()->with('success','Product Status changed successfully');
        
    }
}
