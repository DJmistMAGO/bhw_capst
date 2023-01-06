<?php

namespace App\Http\Controllers;

use App\Models\Household;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Requests\Household\StoreRequest;
use App\Http\Requests\Household\UpdateRequest;


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
        $grbs = ['Burning', 'Dumping'];
        $h_statuses = ['H1', 'H2', 'H3', 'H4', 'H5'];
        $w_source = ['Level 1 - Faucet', 'Level 2 - Hand Pump', 'Level 3 - Deep Well'];
        $fam_plans = ['Pills', 'DMPA', 'SMDA', 'BLL', 'Condom', 'Withdrawal', 'Abstinence', 'IUD', 'Implant'];
        $elecs = ['With Kontador', 'Without Kontador'];
        $sanitation = ['With CR', 'Without CR'];
        $genders = ['Male', 'Female'];
        $status = ['Single', 'Married', 'Widowed', 'Separated', 'Divorced'];


        return view('modules.household.create', compact('puroks', 'swaras', 'choices', 'herbals', 'grbs', 'h_statuses', 'w_source', 'fam_plans', 'elecs', 'sanitation', 'genders', 'status'));
    }


    public function store(StoreRequest $request)
    {
        $validated = $request->validated();

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


    public function show(Household $household)
    {
        $puroks = ['Purok 1', 'Purok 2', 'Purok 3', 'Purok 4', 'Purok 5', 'Sitio Matanac'];
        $swaras = ['NHTS', 'NHTS Non 4PCS', 'Non NHTS'];
        $choices = ['Yes', 'No'];
        $herbals = ['Vegetable Gardening', 'Root Crops'];
        $grbs = ['Burning', 'Dumping'];
        $h_statuses = ['H1', 'H2', 'H3', 'H4', 'H5'];
        $w_source = ['Level 1 - Faucet', 'Level 2 - Hand Pump', 'Level 3 - Deep Well'];
        $fam_plans = ['Pills', 'DMPA', 'SMDA', 'BLL', 'Condom', 'Withdrawal', 'Abstinence', 'IUD', 'Implant'];
        $elecs = ['With Kontador', 'Without Kontador'];
        $sanitation = ['With CR', 'Without CR'];
        $genders = ['Male', 'Female'];
        $status = ['Single', 'Married', 'Widowed', 'Separated', 'Divorced'];

        return view('modules.household.view', compact('household', 'puroks', 'swaras', 'choices', 'herbals', 'grbs', 'h_statuses', 'w_source', 'fam_plans', 'elecs', 'sanitation', 'genders', 'status'));
    }


    public function edit(Household $household)
    {
        $puroks = ['Purok 1', 'Purok 2', 'Purok 3', 'Purok 4', 'Purok 5', 'Sitio Matanac'];
        $swaras = ['NHTS', 'NHTS Non 4PCS', 'Non NHTS'];
        $choices = ['Yes', 'No'];
        $herbals = ['Vegetable Gardening', 'Root Crops'];
        $grbs = ['Burning', 'Dumping'];
        $h_statuses = ['H1', 'H2', 'H3', 'H4', 'H5'];
        $w_source = ['Level 1 - Faucet', 'Level 2 - Hand Pump', 'Level 3 - Deep Well'];
        $fam_plans = ['Pills', 'DMPA', 'SMDA', 'BLL', 'Condom', 'Withdrawal', 'Abstinence', 'IUD', 'Implant'];
        $elecs = ['With Kontador', 'Without Kontador'];
        $sanitation = ['With CR', 'Without CR'];
        $genders = ['Male', 'Female'];
        $status = ['Single', 'Married', 'Widowed', 'Separated', 'Divorced'];

        return view('modules.household.edit', compact('household', 'puroks', 'swaras', 'choices', 'herbals', 'grbs', 'h_statuses', 'w_source', 'fam_plans', 'elecs', 'sanitation', 'genders', 'status'));
    }


    public function update(UpdateRequest $request, $id)
    {
        $validated = $request->validated();

        $household = Household::with('residents')->findOrFail($id);

        // dd($household);

        $household->update(Arr::only($validated, [
            'household_no',
            'purok',
            'total_fam',
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
            'vehicle'
        ]));

        $hhold = $household->residents()->pluck('id');

        $deletedIds = $hhold->diff($validated['memberId'])->toArray();
        if ($deletedIds) {
            $household->residents()->whereIn('id', $deletedIds)->delete();
        }
        foreach ($validated['memberId'] as $key => $housemem) {
            if (!$housemem) {
                $household->residents()->create([
                    'fullname' => $validated['fullname'][$key],
                    'gender' => $validated['gender'][$key],
                    'bdate' => $validated['bdate'][$key],
                    'age' => $validated['age'][$key],
                    'religion' => $validated['religion'][$key],
                    'marital_status' => $validated['marital_status'][$key],
                    'pwd_type' => $validated['pwd_type'][$key],
                    'is_voter' => $validated['is_voter'][$key],
                ]);
            } else {
                $household->residents()->where('id', $housemem)->update([
                    'fullname' => $validated['fullname'][$key],
                    'gender' => $validated['gender'][$key],
                    'bdate' => $validated['bdate'][$key],
                    'age' => $validated['age'][$key],
                    'religion' => $validated['religion'][$key],
                    'marital_status' => $validated['marital_status'][$key],
                    'pwd_type' => $validated['pwd_type'][$key],
                    'is_voter' => $validated['is_voter'][$key],
                ]);
            }

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

        return redirect()->route('household.index')->with('success', 'Household updated successfully!');
    }

    
}
