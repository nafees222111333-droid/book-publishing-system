<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    // Payment Form
    public function create($id)
    {
        $order = Order::findOrFail($id);

        return view('payments.create', compact('order'));
    }

    // Save Payment
    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required',
            'payment_method' => 'required',
        ]);

        $order = Order::findOrFail($request->order_id);

        Payment::create([
            'order_id' => $order->id,
            'payment_method' => $request->payment_method,
            'amount' => $order->total_price,
            'status' => 'Paid',
        ]);

        $order->payment_status = 'Paid';
        $order->save();

        return redirect()->route('my.orders')
            ->with('success', 'Payment Successful!');
    }
}