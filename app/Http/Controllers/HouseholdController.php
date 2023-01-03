<?php

namespace App\Http\Controllers;

use App\Models\Household;
use Illuminate\Http\Request;

class HouseholdController extends Controller
{

    public function index()
    {
        $households = Household::paginate(10);
        return view('modules.household.index', compact('households'));
    }


    public function create()
    {
        return view('modules.household.create');
    }


    public function store(Request $request)
    {
        //
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
