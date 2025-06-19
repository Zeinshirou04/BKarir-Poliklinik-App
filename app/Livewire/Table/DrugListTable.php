<?php

namespace App\Livewire\Table;

use Livewire\Component;
use App\Models\Item\Obat;

class DrugListTable extends Component
{
    protected $listeners = ['daftarObatUpdated' => '$refresh'];
    public ?int $currentDrugId;
    public string $mode = 'none';

    public function emitEditDrug(int $id) {
        $this->mode = 'edit';
        $this->currentDrugId = $id;
        $this->dispatch('editDrugData', id: $id);
    }

    public function emitCancelEditDrug(int $id) {
        $this->mode = 'none';
        $this->currentDrugId = null;
        $this->dispatch('cancelEditDrugData', id: $id);
    }

    public function emitDeleteDrug(int $id) {
        $this->dispatch('deleteDrugData', id: $id);
    }

    public function render()
    {
        $obats = Obat::all();
        return view('livewire.table.drug-list-table', compact('obats'));
    }
}
