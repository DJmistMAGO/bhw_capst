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
        return view('modules.household.create');
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
