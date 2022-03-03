<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable = [
        'vendor',
        'name',
       ];
    public function pmodel()
    {
        return $this->hasMany(pmodel::class);
    }
}
