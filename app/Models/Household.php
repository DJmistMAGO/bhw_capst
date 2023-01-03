<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Household extends Model
{
    use HasFactory;

    protected $fillable = [
        'household_no',
        'housing_status',
        'fam_planning',
        'env_sanitation',
        'animal_owned',
        'water_source',
        'grb_disposal',
        'gardening',
        'vehicles',
        'purok',
        'year_now',
    ];

    public function residents()
    {
        return $this->hasMany(Resident::class);
    }
}
