<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderDelivery extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'required_delivery_date',
        'priority_level',
        'delivery_address',
        'delivery_method',
        'estimated_production_time',
        'special_instructions',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
