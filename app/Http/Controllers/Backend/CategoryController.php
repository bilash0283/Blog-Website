<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category()
    {
        $category = Category::all();
        return view('backend.pages.category.index',['categoris' => $category]);
    }

    public function add_category()
    {
        return view('backend.pages.category.add');
    }

    public function store_category(Request $request)
    {
        $category = Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status
        ]);

       flash()->success('Category created successfully!');

       return redirect()->route('category');

    }


}
