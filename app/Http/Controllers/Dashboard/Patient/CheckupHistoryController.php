<?php

namespace App\Http\Controllers\Dashboard\Patient;

use Illuminate\Http\Request;
use App\Models\Checkup\Periksa;
use App\Http\Controllers\Controller;
use App\Models\Checkup\DetailPeriksa;
use Illuminate\Support\Facades\Auth;

class CheckupHistoryController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->getAuthIdentifier();
        $periksas = Periksa::where('id_pasien', $userId)->with(['dokter', 'detailPeriksa' => function ($query) {
            $query->with('obat')->get();
        }])->get();
        return view('pages.dashboard.patient.riwayat-dashboard', compact('periksas'));
    }
}
