<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class last_covenant extends Model
{
    use HasFactory;
    protected $fillable = [
        'covenans_id',
        'employees_id',
        'serials_id',
        'acceptance',
    ];

    public function covenans()
    {
        return $this->belongsTo(covenant::class , 'covenans_id');
    }

    public function employee()
    {
        return $this->belongsTo(employee::class , 'employees_id');
    }

    public function serials()
    {
        return $this->belongsTo(serial::class , 'serials_id');
    }
}
