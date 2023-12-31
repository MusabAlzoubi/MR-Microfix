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
        $product = Product::create($request->all()); // Create the product
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('images/product', $imageName);
    
            // Assuming you have an 'image' column in your products table
            $product->image = $imageName;
        }
    
      
    
            // Assuming you have a column named 'images' in your products table
      
    
        $product->save(); // Save the updated product with the new image(s)

        // Additional logic if needed
    
        return redirect()->route('products.index');
    }
    
    


    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('Admin.products.edit', compact('product', 'categories'));
    }
    public function update(Request $request, $id)
    {
        // Validation can be added here if needed
        $product = Product::findOrFail($id); // Find the product by ID
    
        $product->update($request->all()); // Update the product with the request data
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('images/product', $imageName);
    
            // Assuming you have an 'image' column in your products table
            $product->image = $imageName;
        }
    
        if ($request->hasFile('images')) {
            $images = $request->file('images'); // Use 'images' instead of 'image'
            $imageNames = [];
    
            foreach ($images as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName(); // Use a more descriptive name
                $image->move('images/product', $imageName);
                $imageNames[] = $imageName; // Append each image name to the array
            }
    
            // Assuming you have a column named 'images' in your products table
            $product->images = $imageNames; // Save the array of image names to the 'images' column
            // Additional logic if needed
        }
    
        $product->save(); // Save the updated product with the new image(s)
    
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
