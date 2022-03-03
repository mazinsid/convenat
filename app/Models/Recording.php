<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recording extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'branch_id',
        'size'
       ];

       public function branch()
       {
           return $this->belongsTo(branch::class);
       }
}
