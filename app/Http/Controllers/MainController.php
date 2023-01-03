<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Household;
// use App\Models\Incident;
// use App\Models\Complaint;
// use Termwind\Components\Dd;

class MainController extends Controller
{
    public function home()
    {
        $households = Household::all()->count();
        // $incidents = Incident::all()->count();
        // $complaints = Complaint::all()->count();

        return view('dashboard', compact('households'));
    }

    // public function brgyInfo()
    // {
    //     return view('brgyinfo.index');
    // }
}
