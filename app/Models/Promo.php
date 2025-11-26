<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    protected $fillable = [
        'title', 'type', 'description', 'discount', 
        'banner_image', 'start_date', 'end_date'
    ];

    public function isActive()
    {
        return now()->between($this->start_date, $this->end_date);
    }
}
