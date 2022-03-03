<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pmodel extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'products_id',
    ];
    public function product()
    {
        return $this->belongsTo(product::class ,'products_id');
    }
    public function ptype()
    {
        return $this->hasMany(ptype::class);
    }
}
