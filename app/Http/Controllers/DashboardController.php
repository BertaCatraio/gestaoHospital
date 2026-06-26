<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Patient;
use App\Model\Doctor;

class DashboardController extends Controller
{
    public function index(){
        $totalDoctor = Doctor::count();
        $totalPatient = Patient::count();
        return view('admin.dashboard.index', compact('totalDoctor', 'totalPatient'));
    }

}
