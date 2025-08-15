<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'file_name',
        'file_path',
        'file_size',
        'file_type',
        'file_status',
        'file_notes',
        'uploaded_at',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
