<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('Admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('Admin.categories.create');
    }

    public function store(Request $request)
    {
        // Validation can be added here if needed
        $category = Category::create($request->all());
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('images/category', $imageName);
    
            // Assuming you have an 'image' column in your categories table
            $category->image = $imageName;
            $category->save();
        }
    7
        return redirect()->route('categories.index')->with('success', 'Category added successfully!');
    }
    

    public function edit(Category $category)
    {
        return view('Admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        // Validation can be added here if needed
        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully!');
    }
}
