<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'city_id',
        'entrance_date',
        'leave_date',
        'amenities',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
