<?php

namespace App\Livewire\Details;

use App\Models\Checkup\JanjiPeriksa;
use Livewire\Component;

class PatientCheckupInfo extends Component
{
    public $janjiId;

    public function emitReturn() {
        $this->dispatch('showHistoryTable');
    }

    public function render()
    {
        $janji = JanjiPeriksa::where('id', $this->janjiId)->with('jadwalPeriksa.dokter')->first();
        // dd($janji);
        return view('livewire.details.patient-checkup-info', compact('janji'));
    }
}
