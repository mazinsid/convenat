<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class landline extends Model
{
    use HasFactory;
    protected $fillable = [
        'land_type',
        'properties',
        'uses',
        'serial',
        'circle_number',
        'cab_number',
        'circuit_type',
        'circuit_speed',
        'providers_id',
        'landline_expiry_date',
    ];
    public function provider()
    {
        return $this->belongsTo(provider::class, 'providers_id');
    }

    public  function landline_covenant(){
        return $this->hasMany(landline_covenant::class);
    }
    public function faults()
    {
        return $this->hasMany(faults::class);
    }
}
