<?php

namespace App\Livewire;
use Cart;
use Livewire\Component;
use App\Models\Prodact;


class CartShop extends Component
{
    public function increaseQuantity($rowId)
    {
        $item = Cart::get($rowId);
        
        if ($item) {
            Cart::update($rowId, $item->qty + 1);
            $this->cart = Cart::content();
        }
    }

    public function decreaseQuantity($rowId)
    {
        $item = Cart::get($rowId);

        if ($item && $item->qty > 1) {
            Cart::update($rowId, $item->qty - 1);
            $this->cart = Cart::content();
        }
    }
    public function deleteItem($rowId)
    {
        Cart::remove($rowId);
        $this->cart = Cart::content();
    }
    public function render()
    {
        return view('livewire.cart');



    }
}
