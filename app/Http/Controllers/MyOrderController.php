<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class MyOrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('book')
                    ->where('user_id', Auth::id())
                    ->latest()
                    ->get();

        return view('my-orders', compact('orders'));
    }
}
