<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentAdminController extends Controller
{
    public function index()
    {
        $payments = Payment::with('order.user', 'order.package')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.payments.index', compact('payments'));
    }

    public function show($id)
    {
        $payment = Payment::with('order.user', 'order.package')->findOrFail($id);

        return view('admin.payments.show', compact('payment'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required'
        ]);

        $payment = Payment::findOrFail($id);
        $payment->status = $request->status;
        $payment->save();

        return redirect()->route('admin.payments.show', $id)
            ->with('success', 'Status pembayaran berhasil diperbarui.');
    }
}
