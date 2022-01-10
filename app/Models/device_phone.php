<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class device_phone extends Model
{
    use HasFactory;
    protected $fillable = [
        'type_phone',
        'phone_model',
        'release_date',
    ];

    public function phone()
    {
        return $this->hasMany(phone::class);
    }

    public function convenant_phone()
    {
        return $this->hasMany(convenant_phone::class);
    }
}
