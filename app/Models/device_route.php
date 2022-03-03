<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class device_route extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'model',
        'version',
    ];
}
