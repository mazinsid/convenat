<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class accessory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'ptype_id',

    ];
    public function ptype()
    {
        return $this->belongsTo(ptype::class , 'ptype_id');
    }
    public function covenant_accessory()
    {
        return $this->hasMany(covenant_accessory::class);
    }
}
