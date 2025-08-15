<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'report_name',
        'report_type',
        'report_period_start',
        'report_period_end',
        'status',
        'file_path',
        'generated_by',
        'generated_at',
        'parameters',
    ];
}
