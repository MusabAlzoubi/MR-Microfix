<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('Admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('Admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validation can be added here if needed
        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Product added successfully!');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('Admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        // Validation can be added here if needed
        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }
    public function show(Product $product)
    {
        return view('Admin.products.show', compact('product'));
    }
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }
}
