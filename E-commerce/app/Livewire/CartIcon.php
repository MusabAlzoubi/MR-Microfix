<?php

namespace App\Livewire;
use Cart;

use Livewire\Component;

class CartIcon extends Component
{
    public function deleteItem($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        $this->cart = Cart::instance('cart')->content();
    }
    protected $listeners = ['refreshComponent'=>'$refresh'];

    public function render()
    {
        return view('livewire.cart-icon');
    }
}
