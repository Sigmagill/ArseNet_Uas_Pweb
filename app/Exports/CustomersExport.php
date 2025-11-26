<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class CustomersExport implements FromCollection
{
    public function collection()
    {
        return User::where('role', 'customer')->get([
            'id', 'name', 'email', 'phone', 'address', 'created_at'
        ]);
    }
}
