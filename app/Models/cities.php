<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cities extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'location',
        'regions_id',
    ];

    public function region()
    {
        return $this->belongsTo(region::class,'regions_id');

    }
    
    public  function branch()
    {
        return $this->hasMany(branch::class);
    }
}
