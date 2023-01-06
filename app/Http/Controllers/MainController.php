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

        $withElect = $households->where('electrification', '==', 'With Kontador')->count();

        $withAnimal = $households->where('animal_owned', '!=', null)->count();
        $withVehicle = $households->where('vehicle', '!=', null)->count();
        $voterCount = $households->sum('total_voter');

        $households = $households->sortBy('purok');
        $households_purok1 = $households->where('purok', 'Purok 1');
        $households_purok2 = $households->where('purok', 'Purok 2');
        $households_purok3 = $households->where('purok', 'Purok 3');
        $households_purok4 = $households->where('purok', 'Purok 4');
        $households_purok5 = $households->where('purok', 'Purok 5');
        $households_sitio = $households->where('purok', 'Sitio Matanac');


        $res_p1 = $households_purok1->map(function ($household) {
            return $household->residents->count();
        })->sum();

        $res_p2 = $households_purok2->map(function ($household) {
            return $household->residents->count();
        })->sum();

        $res_p3 = $households_purok3->map(function ($household) {
            return $household->residents->count();
        })->sum();

        $res_p4 = $households_purok4->map(function ($household) {
            return $household->residents->count();
        })->sum();

        $res_p5 = $households_purok5->map(function ($household) {
            return $household->residents->count();
        })->sum();

        $res_sitio = $households_sitio->map(function ($household) {
            return $household->residents->count();
        })->sum();




        return view('dashboard', compact('resCount', 'male', 'female', 'households', 'families', 'houseCount', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'wsL1', 'wsL2', 'wsL3', 'pwdCount', 'seniorCount', 'voterCount', 'withSanitation', 'useSalt', 'herbalCount', 'withElect', 'withAnimal', 'withVehicle', 'res_p1', 'res_p2', 'res_p3', 'res_p4', 'res_p5', 'res_sitio'));
    }
}
