<?php

namespace App\Livewire\Table;

use App\Models\Checkup\JanjiPeriksa;
use Livewire\Component;
use App\Models\Checkup\Periksa;
use Illuminate\Support\Facades\Auth;

class PatientCheckupTable extends Component
{
    protected $listeners = ['daftarPeriksaUpdated' => '$refresh'];

    public function render()
    {
        $userId = Auth::user()->getAuthIdentifier();
        $janjiPeriksas = JanjiPeriksa::where('id_pasien', $userId)
            ->with(['dokter', 'periksa', 'jadwalPeriksa'])
            ->get();
        // dd($janjiPeriksas);
        return view('livewire.table.patient-checkup-table', compact('janjiPeriksas'));
    }
}
