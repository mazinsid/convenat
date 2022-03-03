<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CovenantDeviceRoute extends Model
{
    use HasFactory;
    protected $fillable = [
        'device_route_id',
        'department_id',
        'acceptance_date',
        'note',
        'code_number',
    ];
    public function device_route()
    {
        return $this->belongsTo(device_route::class, 'device_route_id');
    }
    public function department()
    {
        return $this->belongsTo(department::class,'department_id');
    }
}
