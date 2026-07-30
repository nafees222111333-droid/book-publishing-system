<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class DownloadController extends Controller
{
    public function download($id)
    {
        $order = Order::with('book')->findOrFail($id);

        // Sirf apna order download kar sake
        if ($order->user_id != Auth::id()) {
            abort(403);
        }

        // Sirf Approved + Paid + PDF
        if (
            $order->status != 'Approved' ||
            $order->payment_status != 'Paid' ||
            $order->book_type != 'PDF'
        ) {
            return back()->with('error', 'You cannot download this PDF.');
        }

        return response()->download(
            storage_path('app/public/' . $order->book->pdf_file)
        );
    }
}