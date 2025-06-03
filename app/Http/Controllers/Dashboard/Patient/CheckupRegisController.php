<?php

namespace App\Http\Controllers\Dashboard\Patient;

use Illuminate\Http\Request;
use App\Models\Checkup\Periksa;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckupRegisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::user()->getAuthIdentifier();
        $periksas = Periksa::where('id_pasien', $userId)->get();
        return view('pages.dashboard.patient.periksa-dashboard', compact('periksas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
