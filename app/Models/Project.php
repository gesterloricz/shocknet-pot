<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'project_name',
        'status',
    ];

    /**
     * A project belongs to a client
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * A project has one order specification
     */
    public function specification()
    {
        return $this->hasOne(OrderSpecification::class);
    }

    /**
     * A project can have many uploaded files
     */
    public function files()
    {
        return $this->hasMany(OrderFile::class);
    }

    /**
     * A project has one delivery record
     */
    public function delivery()
    {
        return $this->hasOne(OrderDelivery::class);
    }
}
