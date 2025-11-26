<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;

class OrdersExport implements FromCollection
{
    public function collection()
    {
        return Order::with('user', 'package')->get()->map(function ($o) {
            return [
                'ID' => $o->id,
                'Customer' => $o->user->name,
                'Paket' => $o->package->name,
                'Status' => $o->status,
                'Tanggal' => $o->created_at->format('d-m-Y')
            ];
        });
    }
}
