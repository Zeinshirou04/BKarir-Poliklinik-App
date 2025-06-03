<?php

namespace App\Livewire\Table;

use Livewire\Component;
use App\Models\Item\Obat;

class DrugListTable extends Component
{
    protected $listeners = ['daftarObatUpdated' => '$refresh'];

    public function emitEditDrug(int $id) {
        $this->dispatch('editDrugData', id: $id);
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
