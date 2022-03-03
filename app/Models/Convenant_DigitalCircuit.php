<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convenant_DigitalCircuit extends Model
{
    use HasFactory;
    protected $fillable = [
       
        'code' ,
        'branch_id' ,
        'employees_id' ,
        'DigitalCircuit_id',
        'note',
        'convenant_date',
    ];
    public function employee()
    {
        return $this->belongsTo(employee::class , 'employees_id');
    }
    public function branch()
    {
        return $this->belongsTo(branch::class , 'branch_id');
    }
    public function DigitalCircuit()
    {
        return $this->belongsTo(DigitalCircuit::class , 'DigitalCircuit_id');
    }
}
