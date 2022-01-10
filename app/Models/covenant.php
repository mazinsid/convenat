<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class covenant extends Model
{
    use HasFactory;
    protected $fillable = [
        'employees_id',
        'ptypes_id',
        'serials_id',
        'acceptance',
        'code_number',
        'plate_number',
        'call_number',
        'call_code',
        'vehicle_type',
        'note',
    ];
    public function serial()
    {
        return $this->belongsTo(serial::class , 'serials_id');
    }

    public function ptype()
    {
        return $this->belongsTo(ptype::class , 'ptypes_id');
    }

    public function employee()
    {
        return $this->belongsTo(employee::class , 'employees_id');
    }
    public function covenant_accessory()
    {
        return $this->hasMany(covenant_accessory::class);
    }
}
