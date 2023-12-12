<?php

namespace App\Livewire;
use Cart;
use Livewire\Component;
use App\Models\Prodact;


class CartShop extends Component
{
    public function increaseQuantity($rowId)
    {
        $item = Cart::instance('cart')->get($rowId);
        
        if ($item) {
            Cart::instance('cart')->update($rowId, $item->qty + 1);
            $this->cart = Cart::content();
        }
    }

    public function decreaseQuantity($rowId)
    {
        $item = Cart::instance('cart')->get($rowId);

        if ($item && $item->qty > 1) {
            Cart::instance('cart')->update($rowId, $item->qty - 1);
            $this->cart = Cart::content();
        }
    }
    public function deleteItem($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        $this->cart = Cart::instance('cart')->content();
    }
    public function render()
    {
        return view('livewire.cart');



    }
}
