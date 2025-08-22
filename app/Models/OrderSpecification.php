<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderSpecification extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'product_type',
        'quantity',
        'printing_method',
        'size',
        'paper_type',
        'paper_weight',
        'color_spec',
        'finishing_option',
        'binding_type',
        'lamination_type',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
