<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class return_phone extends Model
{
    use HasFactory;
    protected $fillable = [
        'convenant_phone_id',
        'code',
        'note',
        'return_date',
         ];

         public function convenant_phone()
         {
             return $this->belongsTo(convenant_phone::class , 'convenant_phone_id');
         }
}
