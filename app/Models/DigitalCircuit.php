<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DigitalCircuit extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'monthly_cost',
        'design_type',
        'name_circuit',
        'speed',
        'location',
    ];

    public function Convenant_DigitalCircuit()
    {
        return $this->hasMany(Convenant_DigitalCircuit::class);
    }
}
