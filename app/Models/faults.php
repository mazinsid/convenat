<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class faults extends Model
{
    use HasFactory;
    protected $fillable = [
        'landline_id',
        'reason',
        'faults_date',
        'fixed_date', 
    ];

    public function landline()
    {
        return $this->belongsTo(landline::class);
    }
}
