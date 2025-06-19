<?php

namespace App\Http\Controllers\Dashboard\Patient;

use Illuminate\Http\Request;
use App\Models\Checkup\Periksa;
use App\Http\Controllers\Controller;
use App\Models\Checkup\JanjiPeriksa;
use Illuminate\Support\Facades\Auth;
use App\Models\Checkup\DetailPeriksa;

class CheckupHistoryController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.patient.riwayat-dashboard');
    }
}
