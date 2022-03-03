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
        'status',
    ];
    public function provider()
    {
        return $this->belongsTo(provider::class , 'provider_id');
    }
}
