<?php

namespace App\Livewire;
use Cart;

use Livewire\Component;

class CartIcon extends Component
{
    public function deleteItem($rowId)
    {
        Cart::remove($rowId);
        $this->cart = Cart::content();
    }
    public function render()
    {
        return view('livewire.cart-icon');
    }
}
