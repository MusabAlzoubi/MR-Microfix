<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;
use App\Models\OrderDetail;
use Cart;

class Chekout extends Component
{

    
    // ...
    
    public function placeOrder()
    {
        $user = auth()->user();
        $cartItems = Cart::instance('cart')->content();
    
        // Calculate total amount
        $totalAmount = (float) Cart::instance('cart')->total();
    
        // Create an order
        $order = Order::create([
            'user_id' => $user->id,
            'total_amount' => $totalAmount,
        ]);
    
        // Add order details
        foreach ($cartItems as $item) {
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $item->model->id,
                'quantity' => $item->qty,
                'price' => $item->price,
            ]);
        }
    
        // Clear the cart after placing the order
        Cart::instance('cart')->destroy();
    
        // Redirect or do anything else as needed
        return redirect()->route('thank-you-page');
    }
    
    
    
    
    
    public function render()
    {
        $cartItems = Cart::instance('cart')->content();

        return view('livewire.chekout' , ['cartItems' => $cartItems]);
    }
}

