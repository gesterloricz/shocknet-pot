<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderSpecification extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_type',
        'quantity',
        'printing_method',
        'size_dimensions',
        'paper_type',
        'paper_weight_gsm',
        'color_specification',
        'binding_type',
        'lamination_type',
        'finishing_instructions',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
