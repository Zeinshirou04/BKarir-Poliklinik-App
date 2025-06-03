<?php

namespace App\Livewire\Details;

use Livewire\Component;
use App\Models\Checkup\DetailPeriksa;

class PatientCheckupDetails extends Component
{
    public $checkupId;

    public function render()
    {
        $details = DetailPeriksa::where('id_periksa', $this->checkupId)->with(['periksa.pasien', 'obat'])->first();
        return view('livewire.details.patient-checkup-details', compact('details'));
    }
}
