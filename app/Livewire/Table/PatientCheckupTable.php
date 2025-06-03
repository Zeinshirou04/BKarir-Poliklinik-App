<?php

namespace App\Livewire\Table;

use Livewire\Component;
use App\Models\Checkup\Periksa;
use Illuminate\Support\Facades\Auth;

class PatientCheckupTable extends Component
{
    protected $listeners = ['daftarPeriksaUpdated' => '$refresh'];

    public function render()
    {
        $userId = Auth::user()->getAuthIdentifier();
        $periksas = Periksa::where('id_pasien', $userId)->get();
        return view('livewire.table.patient-checkup-table', compact('periksas'));
    }
}
