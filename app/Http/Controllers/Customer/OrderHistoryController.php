<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class OrderHistoryController extends Controller
{
    public function index()
    {
        $orders = Order::with(['package', 'payment'])
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();


        return view('customer.orders.index', compact('orders'));
    }
}
