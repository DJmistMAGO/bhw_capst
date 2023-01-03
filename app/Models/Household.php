<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Household extends Model
{
    use HasFactory;

    protected $fillable = [
        'household_no',
        'purok',
        'total_fam',
        'total_pwd',
        'total_senior',
        'swara',
        'salt',
        'herbal',
        'grb_disposal',
        'housing_status',
        'water_source',
        'fam_planning',
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
