<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'email',
        'job_id',
        'rank_id',
        'gender',
        'national_id',
        'department_id',
        'branch_id',
    ];
    public function department()
    {
        return $this->belongsTo(department::class,'department_id');
    }
    public function branch()
    {
        return $this->belongsTo(branch::class,'branch_id');
    }
    public function job()
    {
        return $this->belongsTo(job::class, 'job_id');
    }
    public function rank()
    {
        return $this->belongsTo(rank::class,'rank_id');
    }
    public function covenan()
    {
        return $this->hasMany(covenant::class);
    }
    public function sim_covenants()
    {
        return $this->hasMany(sim_covenant::class);
    }

    public function convenant_phone()
    {
        return $this->hasMany(convenant_phone::class);
    }
}
