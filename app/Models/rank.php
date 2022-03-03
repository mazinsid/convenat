<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rank extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];
    public function rank()
    {
        return $this->hasMany(employee::class);
    }
}
