<?php

namespace App\Livewire;

use Livewire\Component;
use Cart;

class WishlistIcon extends Component
{
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
