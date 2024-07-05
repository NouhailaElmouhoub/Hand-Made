<?php

// app/Http/Controllers/Admin/AdminController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;

class AdminController extends Controller
{
    public function orders()
    {
        $this->authorize('viewAny', Order::class); // Vérifie l'autorisation

        $orders = Order::with('items.product')->get();

        return view('admin.orders.index', [
            'orders' => $orders,
        ]);
    }
}

