<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class landline_covenant extends Model
{
    use HasFactory;
    protected $fillable = [
        'branches_id',
        'landlines_id',
        'acceptance_date',
        'note',
        'code_number',
    ];
    public function landline()
    {
        return $this->belongsTo(landline::class , 'landlines_id');
    }
    public function branch()
    {
        return $this->belongsTo(branch::class , 'branches_id');
    }
}
