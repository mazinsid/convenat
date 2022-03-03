<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ptype extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'pmodel_id',
    ];
    public function pmodel()
    {
        return $this->belongsTo(pmodel::class , 'pmodel_id');
    }
    public function accessory()
    {
        return $this->hasMany(accessory::class);
    }
    public function serial()
    {
        return $this->hasMany(serial::class);
    }
    public function covenan()
    {
        return $this->hasMany(covenant::class);
    }
}
