<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class serial extends Model
{
    use HasFactory;
    protected $fillable = [
        'serial',
        'ptype_id',
        'status',
    ];
    use HasFactory;
    public function ptype()
    {
        return $this->belongsTo(ptype::class , 'ptype_id');
    }
    public function covenan()
    {
        return $this->hasMany(covenant::class);
    }
}
