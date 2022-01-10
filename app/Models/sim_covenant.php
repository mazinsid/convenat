<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sim_covenant extends Model
{
    use HasFactory;
    protected $fillable = [
        'simcards_id',
        'employees_id',
        'acceptance_date',
        'note',
        'code_number',
    ];
    public function simcard()
    {
        return $this->hasMany(simcard::class);
    }
    public function employee()
    {
        return $this->hasMany(employee::class);
    }
}
