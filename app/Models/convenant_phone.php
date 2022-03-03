<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class convenant_phone extends Model
{
    use HasFactory;
    protected $fillable = [
        'code' ,
        'employees_id' ,
        'serial',
        'device_phone_id',
        'note',
        'convenant_date',
    ];

    public function employee()
    {
        return $this->belongsTo(employee::class , 'employees_id');
    }

    public function device_phone()
    {
        return $this->belongsTo(device_phone::class , 'device_phone_id');
    }

    public function phones()
    {
        return $this->belongsTo(phone::class , 'serial');
    }

    public function return_phone()
    {
        return $this->hasOne(convenant_phone::class , 'convenant_phone_id');
    }
}
