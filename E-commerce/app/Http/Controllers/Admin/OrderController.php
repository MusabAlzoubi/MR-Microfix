<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return view('Admin.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with('orderDetails.product')->find($id);
        return view('Admin.orders.show', compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
 

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    // Validate the request if needed
    $request->validate([
        'status' => 'required|in:Canceled,Accepted,Charging,Delivered,Received',
    ]);

    // Find the order by ID
    $order = Order::find($id);

    if (!$order) {
        // Handle the case where the order is not found
        return redirect()->back()->with('error', 'Order not found');
    }

    // Update the order status
    $order->status = $request->input('status');
    $order->save();

    // Redirect back with success message
    return redirect()->back()->with('success', 'Order status updated successfully');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the order by ID
        $order = Order::find($id);
    
        if (!$order) {
            // Handle the case where the order is not found
            return redirect()->back()->with('error', 'Order not found');
        }
    
        // Delete the order
        $order->delete();
    
        // Redirect back with success message
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully');
    }
}
