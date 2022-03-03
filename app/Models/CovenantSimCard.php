<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CovenantSimCard extends Model
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
        return $this->belongsTo(simcard::class ,'simcards_id');
    }
    public function employee()
    {
        return $this->belongsTo(employee::class ,'employees_id');
    }
}
