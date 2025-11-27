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
        $totalCustomers = User::where('role', 'customer')->count();

        $totalPackages = Package::count();

        $totalOrders = Order::count();

        $latestOrders = Order::with('user', 'package')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

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
