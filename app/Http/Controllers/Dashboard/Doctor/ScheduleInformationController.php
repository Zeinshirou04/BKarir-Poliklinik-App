<?php

namespace App\Http\Controllers\Dashboard\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ScheduleInformationController extends Controller
{
    public function index() {
        return view('pages.dashboard.doctor.jadwal-periksa-dashboard');
    }
}
