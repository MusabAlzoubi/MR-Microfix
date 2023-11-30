<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;
use Cart;
class Shop extends Component
{
    use WithPagination;
    public $selectedOption = 30;

    public function store($product_id, $product_name, $product_price)
    {
        // Using the 'associate' method with the fully-qualified namespace
        Cart::add($product_id, $product_name, 1, $product_price)->associate(\App\Models\Product::class);
    
        // Flashing a success message to the session
        session()->flash('success_message', 'Item added to the cart successfully');
    
        // Redirecting to the 'shop.cart' route
        return redirect()->route('shop.cart');
    }
    
    public function updatedSelectedOption($selectedOption)
    {
        $this->selectedOption = $selectedOption; // Fix the typo here
    }
    
    public function render()
    {
        $products = Product::paginate($this->selectedOption); // Fix the typo here
        return view('livewire.shop', ['products' => $products]);
    }
    
}



