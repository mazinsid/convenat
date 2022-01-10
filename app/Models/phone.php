<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class phone extends Model
{
    use HasFactory;
    protected $fillable = [
        'serial',
        'type',
        'mobile_number',
        'mobile_features',
        'device_phone_id',
        'status',
    ];

    public function DevicePhone()
    {
        return $this->belongsTo(device_phone::class, 'device_phone_id');
    }

    public function convenant_phone()
    {
        return $this->hasMany(convenant_phone::class);
    }
}
