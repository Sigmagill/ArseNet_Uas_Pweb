<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    // List semua paket
    public function index()
    {
        $packages = Package::orderBy('id', 'desc')->get();
        return view('admin.packages.index', compact('packages'));
    }

    // Form tambah paket
    public function create()
    {
        return view('admin.packages.create');
    }

    // Proses tambah paket
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required',
            'speed'       => 'required|integer',
            'price'       => 'required|integer',
            'description' => 'nullable'
        ]);

        Package::create($request->all());

        return redirect()->route('admin.packages.index')
            ->with('success', 'Paket berhasil ditambahkan!');
    }

    // Form edit paket
    public function edit($id)
    {
        $package = Package::findOrFail($id);
        return view('admin.packages.edit', compact('package'));
    }

    // Proses update paket
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'        => 'required',
            'speed'       => 'required|integer',
            'price'       => 'required|integer',
            'description' => 'nullable'
        ]);

        $package = Package::findOrFail($id);
        $package->update($request->all());

        return redirect()->route('admin.packages.index')
            ->with('success', 'Paket berhasil diperbarui!');
    }

    // Hapus paket
    public function delete($id)
    {
        Package::findOrFail($id)->delete();

        return redirect()->route('admin.packages.index')
            ->with('success', 'Paket berhasil dihapus!');
    }
}
