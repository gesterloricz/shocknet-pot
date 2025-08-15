<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderPackagingOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'packaging_option_id',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function packagingOption()
    {
        return $this->belongsTo(PackagingOption::class);
    }
}
