<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class region extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'name',
        'phone',
        'location',
    ];
    public function cities()
    {
        return $this->hasMany(cities::class);
    }
}
