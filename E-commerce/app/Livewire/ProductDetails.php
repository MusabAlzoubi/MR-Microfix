<?php

namespace App\Livewire;
use App\Models\Product;
use Cart;

use Livewire\Component;

class ProductDetails extends Component
{
    public $slug;
    public function mount($slug)
    {
        $this->slug = $slug ;
    }
    public function store($product_id, $product_name, $product_price)
    {
        // Using the 'associate' method with the fully-qualified namespace
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate(\App\Models\Product::class);
    
        // Flashing a success message to the session
        session()->flash('success_message', 'Item added to the cart successfully');
    
        // Redirecting to the 'shop.cart' route
        return redirect()->route('shop.cart');
    }
    public function render()
    {

        $product = Product::where('slug', $this->slug)->first();
        $products = Product::where('category_id', $product->category_id)->inRandomOrder()->limit(4)->get();
        $nproducts = Product::Latest()->take(4)->get();

        return view('livewire.product-details',['product'=>$product , 'products'=>$products]);
    }
}
