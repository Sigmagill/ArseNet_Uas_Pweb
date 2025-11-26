<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;
use App\Models\Package;
use App\Models\Payment;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // total user customer
        $totalCustomers = User::where('role', 'customer')->count();

        // total paket internet
        $totalPackages = Package::count();

        // total pesanan
        $totalOrders = Order::count();

        // pesanan terbaru
        $latestOrders = Order::with('user', 'package')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // NOTIF: pesanan & pembayaran pending
        $pendingOrders = Order::where('status', 'pending')->count();
        $pendingPayments = Payment::where('status', 'pending')->count();

        return view('admin.dashboard', compact(
            'totalCustomers',
            'totalPackages',
            'totalOrders',
            'latestOrders',
            'pendingOrders',
            'pendingPayments'
        ));
    }
}
