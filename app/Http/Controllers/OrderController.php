<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // Customer Order
    public function store(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $shipping = ($request->book_type == 'PDF') ? 0 : 200;

        Order::create([
            'user_id' => Auth::id(),
            'book_id' => $book->id,
            'book_type' => $request->book_type,
            'quantity' => 1,
            'price' => $book->price,
            'shipping_charge' => $shipping,
            'total_price' => $book->price + $shipping,
            'status' => 'Pending',
            'address' => $request->address,
        ]);

        return back()->with('success', 'Order Placed Successfully!');
    }

    // Admin Orders List
    public function index()
    {
        $orders = Order::with('user', 'book')->latest()->get();

        return view('orders.index', compact('orders'));
    }

    // Approve Order
    public function approve($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'Approved';
        $order->save();

        return back()->with('success', 'Order Approved');
    }

    // Reject Order
    public function reject($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'Rejected';
        $order->save();

        return back()->with('success', 'Order Rejected');
    }
}