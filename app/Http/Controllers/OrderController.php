<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function destroy($id)
    {
        $order = Order::findOrFail($id);

        // Optionally, you can add a check to ensure the user can only delete their own orders
        if ($order->getUserId() == Auth::id()) {
            // Delete associated items first
            foreach ($order->getItems() as $item) {
                $item->delete();
            }
            
            // Delete the order
            $order->delete();

            return redirect()->back()->with('success', 'Order deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'You are not authorized to delete this order.');
        }
    }
    public function index()
    {
        
        $orders = Order::all();
        
        
        return view('admin.orders.index1', compact('orders'));
    }
    
}


