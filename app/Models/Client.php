<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_name',
        'email',
        'phone_number',
        'status',
    ];

    /**
     * A client can have many projects
     */
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
