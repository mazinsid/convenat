<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class covenant_accessory extends Model
{
    use HasFactory;
    protected $fillable = [
        'covenans_id',
        'accessories_id',
    ];
    use HasFactory;
    public function covenan()
    {
        return $this->belongsTo(covenant::class , 'covenans_id');
    }
    public function accessory()
    {
        return $this->belongsTo(accessory::class , 'accessories_id');
    }
}
