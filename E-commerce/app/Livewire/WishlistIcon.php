<?php

namespace App\Livewire;

use Livewire\Component;
use Cart;

class WishlistIcon extends Component
{
    public function store($product_id, $product_name, $product_price)
    {
        // Using the 'associate' method with the fully-qualified namespace
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate(\App\Models\Product::class);
    
        // Flashing a success message to the session
        session()->flash('success_message', 'Item added to the cart successfully');
    
        // Redirecting to the 'shop.cart' route
        return redirect()->route('shop.cart');
    }
    protected $listeners = ['refreshWishlistIcon'=>'$refresh'];

    public function deleteFromWisshList($product_id)
    {
        foreach(Cart::instance('wishlist')->content() as $witem)
        {
            if($witem->id == $product_id )
            {
                Cart::instance('wishlist')->remove($witem->rowId);
                return;
            }
        }

    }
    public function render()
    {
        return view('livewire.wishlist-icon');
    }
}
