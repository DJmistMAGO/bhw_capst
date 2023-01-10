<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Household extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'household_no',
        'purok',
        'total_fam',
        'total_pwd',
        'total_senior',
        // 'swara',
        'salt',
        'herbal',
        'grb_disposal',
        'housing_status',
        'water_source',
        'fam_planning',
        'otherOption',
        'env_sanitation',
        'electrification',
        'animal_owned',
        'vehicle',
        'total_voter',

    ];

    public function residents()
    {
        return $this->hasMany(Resident::class);
    }
}
