<?php

namespace App\Livewire\Section;

use Livewire\Component;
use Livewire\Attributes\On;

class DrugInformationSection extends Component
{
    public ?string $mode;

    public function trashed()
    {
        $this->mode = 'trashed';
    }

    public function back()
    {
        $this->mode = null;
    }

    public function mount() {
        $this->mode = null;
    }

    public function render()
    {
        return view('livewire.section.drug-information-section');
    }
}
