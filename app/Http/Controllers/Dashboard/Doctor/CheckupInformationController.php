<?php

namespace App\Http\Controllers\Dashboard\Doctor;

use Illuminate\Http\Request;
use App\Models\Checkup\Periksa;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckupInformationController extends Controller
{
    public function index() {
        return view('pages.dashboard.doctor.periksa-dashboard');
    }
}
