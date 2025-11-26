<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        // Ambil semua user customer saja
        $customers = User::where('role', 'customer')->orderBy('id', 'desc')->get();

        return view('admin.customers.index', compact('customers'));
    }

    public function edit($id)
    {
        $customer = User::findOrFail($id);

        return view('admin.customers.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'    => 'required',
            'email'   => 'required|email',
            'phone'   => 'nullable',
            'address' => 'nullable',
        ]);

        $customer = User::findOrFail($id);

        $customer->update($request->only([
            'name',
            'email',
            'phone',
            'address'
        ]));

        return redirect()->route('admin.customers.index')
            ->with('success', 'Data pelanggan berhasil diperbarui');
    }

    public function delete($id)
    {
        User::findOrFail($id)->delete();

        return redirect()->route('admin.customers.index')
            ->with('success', 'Pelanggan berhasil dihapus');
    }
}
