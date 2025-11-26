<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    // Tampilkan form edit profil
    public function edit()
    {
        $user = Auth::user();

        return view('customer.profile.edit', compact('user'));
    }

    // Proses update profil
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name'  => 'required',
            'phone' => 'nullable',
            'address' => 'nullable',

            // password optional, tapi kalau diisi harus valid
            'current_password' => 'required_with:password',
            'password' => 'nullable|min:6|confirmed',
        ]);

        // Update data dasar
        $user->name    = $request->name;
        $user->phone   = $request->phone;
        $user->address = $request->address;

        // Kalau user mau ganti password
        if ($request->filled('password')) {
            // cek current password
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors([
                    'current_password' => 'Password lama tidak sesuai.'
                ])->withInput();
            }

            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('customer.profile.edit')
            ->with('success', 'Profil berhasil diperbarui.');
    }
}
