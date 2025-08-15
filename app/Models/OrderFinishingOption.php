<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderFinishingOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'finishing_option_id',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function finishingOption()
    {
        return $this->belongsTo(FinishingOption::class);
    }
}
