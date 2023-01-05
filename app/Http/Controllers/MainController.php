<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Household;
use App\Models\Resident;

class MainController extends Controller
{
    public function home()
    {
        $households = Household::with('residents')->get();
        $residents = Resident::all();


        $resCount = $residents->count();
        $male = $residents->where('gender', 'Male')->count();
        $female = $residents->where('gender', 'Female')->count();
        $families = $households->sum('total_fam');
        $houseCount = $households->count();

        $h1 = $households->where('housing_status', 'H1')->count();
        $h2 = $households->where('housing_status', 'H2')->count();
        $h3 = $households->where('housing_status', 'H3')->count();
        $h4 = $households->where('housing_status', 'H4')->count();
        $h5 = $households->where('housing_status', 'H5')->count();
        $h6 = $households->where('housing_status', 'H6')->count();

        $wsL1 = $households->where('water_source', 'Level 1 - Faucet')->count();
        $wsL2 = $households->where('water_source', 'Level 2 - Hand Pump')->count();
        $wsL3 = $households->where('water_source', 'Level 3 - Deep Well')->count();

        $pwdCount = $households->sum('total_pwd');
        $seniorCount = $households->sum('total_senior');

        $malePwd = $residents->where('pwd_type', '!=', null)->where('gender', '==', 'Male')->count();
        $femalePwd = $residents->where('pwd_type', '!=', null)->where('gender', '==', 'Female')->count();

        $withSanitation = $households->where('env_sanitation', '==', 'Without CR')->count();
        $useSalt = $households->where('salt', '==', 'Yes')->count();
        $herbalCount = $households->where('herbal', '!=', null)->count();

        $withKon = $households->where('electrification', '==', 'With Kontador')->count();
        $withSolar = $households->where('electrification', '==', 'Solar')->count();

        $withElect = $withKon + $withSolar;
        $withAnimal = $households->where('animal_owned', '!=', null)->count();
        $withVehicle = $households->where('vehicle', '!=', null)->count();
        $voterCount = $households->sum('total_voter');

        $p1Count = $households->where('purok', '==', 'Purok 1')->count();
        $p2Count = $households->where('purok', '==', 'Purok 2')->count();
        $p3Count = $households->where('purok', '==', 'Purok 3')->count();
        $p4Count = $households->where('purok', '==', 'Purok 4')->count();
        $p5Count = $households->where('purok', '==', 'Purok 5')->count();
        $p6Count = $households->where('purok', '==', 'Sitio Matanac')->count();


        return view('dashboard', compact('resCount', 'male', 'female', 'households', 'families', 'houseCount', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'wsL1', 'wsL2', 'wsL3', 'pwdCount', 'seniorCount', 'voterCount', 'withSanitation', 'useSalt', 'herbalCount', 'withElect', 'withAnimal', 'withVehicle', 'p1Count', 'p2Count', 'p3Count', 'p4Count', 'p5Count', 'p6Count'));
    }
}
