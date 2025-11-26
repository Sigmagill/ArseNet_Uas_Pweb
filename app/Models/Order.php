<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'package_id',
        'customer_name',
        'customer_phone',
        'installation_address',
        'notes',
        'status',
    ];

    // Relasi ke user (customer yg pesan)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke paket internet
    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    // Relasi ke pembayaran (jika ada)
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
