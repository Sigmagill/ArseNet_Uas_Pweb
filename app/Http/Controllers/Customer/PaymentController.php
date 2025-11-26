<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function create($order_id)
    {
        $order = Order::where('id', $order_id)
                      ->where('user_id', Auth::id())
                      ->firstOrFail();

        return view('customer.payment.create', compact('order'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required',
            'proof_image' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $imageName = time() . '.' . $request->proof_image->extension();
        $request->proof_image->move(public_path('uploads/payments'), $imageName);

        Payment::create([
            'order_id' => $request->order_id,
            'proof_image' => $imageName,
            'status' => 'pending'
        ]);

        return redirect('/customer/orders')->with('success', 'Bukti pembayaran berhasil diupload.');
    }
}
