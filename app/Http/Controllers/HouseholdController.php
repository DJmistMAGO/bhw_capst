<?php

namespace App\Http\Controllers;

use App\Models\Household;
use Illuminate\Http\Request;

class HouseholdController extends Controller
{

    public function index()
    {
        $households = Household::with('residents')->paginate(10);
        return view('modules.household.index', compact('households'));
    }


    public function create()
    {
        $puroks = ['Purok 1', 'Purok 2', 'Purok 3', 'Purok 4', 'Purok 5', 'Sitio Matanac'];
        $swaras = ['NHTS', 'NHTS Non 4PCS', 'Non NHTS'];
        $choices = ['Yes', 'No'];
        $herbals = ['Vegetable Gardening', 'Root Crops'];
        $grbs = ['Burning', 'Dumping', 'Segragating', 'Composting', 'Recycling'];
        $h_statuses = ['H1', 'H2', 'H3', 'H4', 'H5'];
        $w_source = ['Level 1 - Faucet', 'Level 2 - Hand Pump', 'Level 3 - Deep Well', 'Level 4 - Spring', 'Level 5 - River'];
        $fam_plans = ['Pills', 'DMPA', 'SMDA', 'BLL', 'Condom', 'Withdrawal', 'Abstinence', 'IUD', 'Implant'];
        $elecs = ['With Kontador', 'Without Kontador', 'Solar'];
        $sanitation = ['With CR', 'Without CR'];
        $genders = ['Male', 'Female'];
        $status = ['Single', 'Married', 'Widowed', 'Separated', 'Divorced'];


        return view('modules.household.create', compact('puroks', 'swaras', 'choices', 'herbals', 'grbs', 'h_statuses', 'w_source', 'fam_plans', 'elecs', 'sanitation', 'genders', 'status'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'household_no' => 'required',
            'purok' => 'required',
            'total_fam' => 'required',
            'swara' => 'required',
            'salt' => 'required',
            'herbal' => 'required',
            'grb_disposal' => 'required',
            'housing_status' => 'required',
            'water_source' => 'required',
            'fam_planning' => 'required',
            'env_sanitation' => 'required',
            'electrification' => 'required',
            'animal_owned' => 'required',
            'vehicle' => 'required',
            'fullname' => 'nullable',
            'gender' => 'nullable',
            'bdate' => 'nullable',
            'age' => 'nullable',
            'religion' => 'nullable',
            'marital_status' => 'nullable',
            'pwd_type' => 'nullable',
            'is_voter' => 'required',
        ]);

        // dd($validated);

        $household = Household::create([
            'household_no' => $validated['household_no'],
            'purok' => $validated['purok'],
            'total_fam' => $validated['total_fam'],
            'swara' => $validated['swara'],
            'salt' => $validated['salt'],
            'herbal' => $validated['herbal'],
            'grb_disposal' => $validated['grb_disposal'],
            'housing_status' => $validated['housing_status'],
            'water_source' => $validated['water_source'],
            'fam_planning' => $validated['fam_planning'],
            'env_sanitation' => $validated['env_sanitation'],
            'electrification' => $validated['electrification'],
            'animal_owned' => $validated['animal_owned'],
            'vehicle' => $validated['vehicle'],
            'total_senior' => 0,
            'total_pwd' => 0,
            'total_voter' => 0,
        ]);

        foreach ($validated['fullname'] as $key => $value) {
            $household->residents()->create([
                'fullname' => $value,
                'gender' => $validated['gender'][$key],
                'bdate' => $validated['bdate'][$key],
                'age' => $validated['age'][$key],
                'religion' => $validated['religion'][$key],
                'marital_status' => $validated['marital_status'][$key],
                'pwd_type' => $validated['pwd_type'][$key],
                'is_voter' => $validated['is_voter'][$key],
            ]);


            if ($validated['age'][$key] >= 60) {
                $household->increment('total_senior');
            }
            if ($validated['pwd_type'][$key] != null) {
                $household->increment('total_pwd');
            }
            if ($validated['is_voter'][$key] == 'true') {
                $household->increment('total_voter');
            }
        };


        return redirect()->route('household.index')->with('success', 'Household added successfully!');
    }


    public function show($id)
    {
        return view('modules.household.view');
    }


    public function edit($id)
    {
        return view('modules.household.edit');
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
