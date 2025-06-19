<?php

namespace App\Livewire\Section;

use Livewire\Component;
use Livewire\Attributes\On; 

class DetailCheckupSection extends Component
{
    public $janjiId;
    public $checkupId;
    public $mode;

    #[On('showCheckupDetails')]
    public function showCheckupDetails(string $id) {
        $this->janjiId = 0;
        $this->checkupId = $id;
        $this->mode = 'details';
    }
    
    #[On('showEditForm')]
    public function showEditForm(string $id) {
        $this->checkupId = 0;
        $this->janjiId = $id;
        $this->mode = 'edit';
    }

    public function render()
    {
        return view('livewire.section.detail-checkup-section');
    }
}
