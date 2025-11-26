<?php

namespace App\Exports;

use App\Models\Payment;
use Maatwebsite\Excel\Concerns\FromCollection;

class PaymentsExport implements FromCollection
{
    public function collection()
    {
        return Payment::with('order.user', 'order.package')->get()->map(function ($p) {
            return [
                'ID' => $p->id,
                'Customer' => $p->order->user->name,
                'Paket' => $p->order->package->name,
                'Status' => $p->status,
                'Tanggal' => $p->created_at->format('d-m-Y')
            ];
        });
    }
}
