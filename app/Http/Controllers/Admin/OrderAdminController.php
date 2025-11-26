<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderAdminController extends Controller
{
    // Tampilkan semua pesanan
    public function index()
    {
        $orders = Order::with('user', 'package')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.orders.index', compact('orders'));
    }

    // Detail pesanan
    public function show($id)
    {
        $order = Order::with('user', 'package')->findOrFail($id);

        return view('admin.orders.show', compact('order'));
    }

    // Update status pesanan
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required'
        ]);

        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return redirect()->route('admin.orders.show', $id)
            ->with('success', 'Status pesanan berhasil diperbarui.');
    }

    // Hapus pesanan
    public function delete($id)
    {
        Order::findOrFail($id)->delete();

        return redirect()->route('admin.orders.index')
            ->with('success', 'Pesanan berhasil dihapus.');
    }
}
