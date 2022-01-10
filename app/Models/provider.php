<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class provider extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',     
    ];

    public function landline()
    {
        return $this->hasMany(landline::class);
    }
}
