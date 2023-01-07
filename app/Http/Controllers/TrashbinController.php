<?php

namespace App\Http\Controllers;

use App\Models\Household;
use Illuminate\Http\Request;

class TrashbinController extends Controller
{
    public function trashbin()
    {
        $households = Household::with('residents')->onlyTrashed()->get();


        return view('modules.trashbin.index', compact('households'));
    }
}
