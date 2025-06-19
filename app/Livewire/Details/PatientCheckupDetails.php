<?php

namespace App\Livewire\Details;

use Livewire\Component;
use App\Models\Checkup\DetailPeriksa;
use App\Models\Checkup\Periksa;

class PatientCheckupDetails extends Component
{
    public $checkupId;

    public function render()
    {
        $periksa = Periksa::where('id', $this->checkupId)->with('pasien')->first();
        $detailPeriksas = DetailPeriksa::where('id_periksa', $periksa->id)->with('obat')->get();
        return view('livewire.details.patient-checkup-details', compact('periksa', 'detailPeriksas'));
    }
}
