<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FinishingOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'option_name',
        'option_code',
        'description',
        'is_active',
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_finishing_options');
    }
}
