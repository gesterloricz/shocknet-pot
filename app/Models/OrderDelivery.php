<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDelivery extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'delivery_address',
        'delivery_date',
        'delivery_method',
        'packing_requirements',
        'estimated_production_time',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
