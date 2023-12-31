<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class USRProfile extends Controller
{
    public function index()
    {
        // Check if the user is authenticated
        if (auth()->user()) {
            // Get the authenticated user
            $user = User::find(auth()->user()->id);
    
            // Get all orders for the authenticated user with details
            $orders = Order::with('details.product')->where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
    
            // Calculate total order amount
            $totalAmount = $orders->sum('total_amount');
    
            // Return the view with user, orders, and total amount data
            return view('User.index', compact('user', 'orders', 'totalAmount'));
        }
    
        // Handle the case when the user is not authenticated
        return redirect()->route('login');
    }
    
    





}
