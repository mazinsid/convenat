<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class simcard extends Model
{
    use HasFactory;
    protected $fillable = [
        'serial',
        'phone',
        'provider_id',
        'type',
        'route_type',
        'route_model',
        'route_version',
        'status',
    ];
    public function provider()
    {
        return $this->belongsTo(provider::class , 'provider_id');
    }
}
