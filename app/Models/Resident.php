<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    use HasFactory;

    protected $fillable = [
        'household_id',
        'fullname',
        'gender',
        'bdate',
        'age',
        'religion',
        'marital_status',
        'pwd_type',
    ];

    public function household()
    {
        return $this->belongsTo(Household::class);
    }
}
