<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Resident extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'household_id',
        'fullname',
        'gender',
        'bdate',
        'age',
        'religion',
        'marital_status',
        'pwd_type',
        'is_voter'
    ];

    public function household()
    {
        return $this->belongsTo(Household::class);
    }
}
