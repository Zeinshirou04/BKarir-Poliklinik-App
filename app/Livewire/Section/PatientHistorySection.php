<?php

namespace App\Livewire\Section;

use Livewire\Component;
use Livewire\Attributes\On;

class PatientHistorySection extends Component
{
    public $janjiId;
    public $mode = null;

    #[On('showCheckupInfo')]
    public function showCheckupInfo(string $id)
    {
        $this->janjiId = $id;
        $this->mode = 'info';
    }

    #[On('showCheckupHistory')]
    public function showCheckupHistory(string $id)
    {
        $this->janjiId = $id;
        $this->mode = 'history';
    }

    #[On('showHistoryTable')]
    public function showHistoryTable()
    {
        $this->janjiId = null;
        $this->mode = null;
    }

    public function render()
    {
        return view('livewire.section.patient-history-section');
    }
}
