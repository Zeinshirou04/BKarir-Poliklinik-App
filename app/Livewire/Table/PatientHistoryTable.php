<?php

namespace App\Livewire\Table;

use Livewire\Component;
use App\Models\Checkup\JanjiPeriksa;
use Illuminate\Support\Facades\Auth;

class PatientHistoryTable extends Component
{

    public function emitCheckupInfo(int $id)
    {
        $this->dispatch('showCheckupInfo', id: $id);
    }

    public function emitCheckupHistory(int $id)
    {
        $this->dispatch('showCheckupHistory', id: $id);
    }

    public function render()
    {
        $userId = Auth::user()->getAuthIdentifier();
        $janjiPeriksas = JanjiPeriksa::where('id_pasien', $userId)
            ->with(['dokter.poli', 'periksa', 'jadwalPeriksa'])
            ->get();
        return view('livewire.table.patient-history-table', compact('janjiPeriksas'));
    }
}
