<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use Illuminate\Http\Request;
use App\Http\Requests\Resident\UpdateRequest;

class ResidentController extends Controller
{

    public function index()
    {
        $residents = Resident::with('household')->orderBy('household_id', 'asc')->paginate(10);
        return view('modules.resident.index', compact('residents'));
    }

    public function show($id)
    {
        $resident = Resident::with('household')->where('id', $id)->first();
        $genders = ['Male', 'Female'];
        $status = ['Single', 'Married', 'Widowed', 'Separated', 'Divorced'];

        return view('modules.resident.view', compact('resident', 'genders', 'status'));
    }

    public function edit(Request $request, $id)
    {
        $resident = Resident::with('household')->where('id', $request->id)->first();
        $genders = ['Male', 'Female'];
        $status = ['Single', 'Married', 'Widowed', 'Separated', 'Divorced'];

        return view('modules.resident.edit', compact('resident', 'genders', 'status'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $validated = $request->validated();

        $resident = Resident::where('id', $id)->first();

        $resident->update([
            'fullname' => $validated['fullname'],
            'gender' => $validated['gender'],
            'bdate' => $validated['bdate'],
            'age' => $validated['age'],
            'religion' => $validated['religion'],
            'marital_status' => $validated['marital_status'],
            'pwd_type' => $validated['pwd_type'],
            'is_voter' => $validated['is_voter'],
        ]);

        // also update the household->total_pwd and is_voter and total_senior
        $household = $resident->household;
        $household->total_pwd = $household->residents->where('pwd_type', '!=', null)->count();
        $household->total_voter = $household->residents->where('is_voter', 'true')->count();
        $household->total_senior = $household->residents->where('age', '>=', 60)->count();
        $household->save();




        return redirect()->route('resident.index')->with('success', 'Resident updated successfully!');
    }
}
