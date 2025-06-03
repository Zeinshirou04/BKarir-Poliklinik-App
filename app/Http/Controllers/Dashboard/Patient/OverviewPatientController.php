<?php

namespace App\Http\Controllers\Dashboard\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OverviewPatientController extends Controller
{
    public function index() {
        return view('pages.dashboard.patient.overview-dashboard');
    }
}
