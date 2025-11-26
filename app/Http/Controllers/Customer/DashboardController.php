<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Promo;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Pesanan terakhir customer
        $lastOrder = Order::with('package')
            ->where('user_id', $user->id)
            ->latest()
            ->first();

        $activePackage = $lastOrder?->package;

        // Pembayaran pending milik customer
        $pendingPayments = Payment::where('status', 'pending')
            ->whereHas('order', function ($q) use ($user) {
                $q->where('user_id', $user->id);
            })
            ->count();

        // Promo aktif untuk popup
        $activePromos = Promo::where('start_date', '<=', now())
            ->where('end_date', '>=', now())
            ->get();

        // Dummy data penggunaan internet (grafik)
        $usageLabels = ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'];
        $usageValues = [3, 4.5, 2.5, 5, 3.5, 4, 2]; // Contoh data
        $maxUsage = max($usageValues);

        return view('customer.dashboard', compact(
            'user',
            'lastOrder',
            'activePackage',
            'pendingPayments',
            'usageLabels',
            'usageValues',
            'maxUsage',
            'activePromos'
        ));
    }
}
