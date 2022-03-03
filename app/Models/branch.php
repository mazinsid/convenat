<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class branch extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'location',
        'cities_id',
    ];
    use HasFactory;
    public  function cities(){
        return $this->belongsTo(cities::class ,'cities_id');
    }


    public  function landline_covenant()
    {
        return $this->hasMany(landline_covenant::class);
    }

    public function employee()
    {
        return $this->hasMany(employee::class);
    }
    public function Recording()
    {
        return $this->hasMany(Recording::class);
    }
    public function Convenant_DigitalCircuit()
    {
        return $this->hasMany(Convenant_DigitalCircuit::class);
    }
}
