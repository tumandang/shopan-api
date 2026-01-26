<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('pages.categoriesvendor.index', compact('categories'));
    }

    public function create()
    {
        return view('pages.categoriesvendor.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:categories,slug',
        ]);

        Category::create($request->only('name','slug'));
        return redirect()->route('categories.index')->with('success','Category added.');
    }

    public function edit(Category $category)
    {
        return view('pages.categoriesvendor.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => "required|string|unique:categories,slug,{$category->id}",
        ]);

        $category->update($request->only('name','slug'));
        return redirect()->route('categories.index')->with('success','Category updated.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success','Category deleted.');
    }
}
