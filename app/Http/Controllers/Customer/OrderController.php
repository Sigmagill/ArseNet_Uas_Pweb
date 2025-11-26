<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Package;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // List semua paket untuk dipilih
    public function index()
    {
        $packages = Package::all();
        return view('customer.order.index', compact('packages'));
    }

    // Form pemesanan paket tertentu
    public function create($id)
    {
        $package = Package::findOrFail($id);
        $user = Auth::user();

        return view('customer.order.create', compact('package', 'user'));
    }

    // Simpan pesanan ke database
    public function store(Request $request)
    {
        $request->validate([
            'package_id' => 'required',
            'customer_name' => 'required',
            'customer_phone' => 'required',
            'installation_address' => 'required',
            'notes' => 'nullable',
        ]);

        Order::create([
            'user_id' => Auth::id(),
            'package_id' => $request->package_id,
            'customer_name' => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'installation_address' => $request->installation_address,
            'notes' => $request->notes,
            'status' => 'pending',
        ]);

        return redirect()->route('customer.dashboard')
            ->with('success', 'Pesanan berhasil dikirim! Admin akan segera memproses.');
    }
}
