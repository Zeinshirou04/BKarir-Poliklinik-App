<?php

namespace App\Livewire\Details;

use Livewire\Component;
use App\Models\Checkup\Periksa;
use App\Models\Checkup\DetailPeriksa;

class PatientHistoryDetails extends Component
{
    public $janjiId;

    public function emitReturn() {
        $this->dispatch('showHistoryTable');
    }

    public function render()
    {
        $periksa = Periksa::where('id', $this->janjiId)->with('obat')->first();
        // dd($periksa);
        return view('livewire.details.patient-history-details', compact('periksa'));
    }
}
