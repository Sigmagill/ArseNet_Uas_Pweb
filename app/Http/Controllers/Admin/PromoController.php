<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Promo;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    public function index()
    {
        $promos = Promo::orderBy('id','desc')->get();
        return view('admin.promos.index', compact('promos'));
    }

    public function create()
    {
        return view('admin.promos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'type' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'banner_image' => 'image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $fileName = null;
        if ($request->hasFile('banner_image')) {
            $fileName = time().'_'.$request->banner_image->getClientOriginalName();
            $request->banner_image->move(public_path('uploads/promos'), $fileName);
        }

        Promo::create([
            'title' => $request->title,
            'type' => $request->type,
            'description' => $request->description,
            'discount' => $request->discount,
            'banner_image' => $fileName,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('admin.promos.index')->with('success','Promo berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $promo = Promo::findOrFail($id);
        return view('admin.promos.edit', compact('promo'));
    }

    public function update(Request $request, $id)
    {
        $promo = Promo::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'type' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $fileName = $promo->banner_image;

        if ($request->hasFile('banner_image')) {
            $fileName = time().'_'.$request->banner_image->getClientOriginalName();
            $request->banner_image->move(public_path('uploads/promos'), $fileName);
        }

        $promo->update([
            'title' => $request->title,
            'type' => $request->type,
            'description' => $request->description,
            'discount' => $request->discount,
            'banner_image' => $fileName,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('admin.promos.index')->with('success','Promo berhasil diperbarui!');
    }

    public function delete($id)
    {
        Promo::findOrFail($id)->delete();
        return back()->with('success','Promo berhasil dihapus.');
    }
}
