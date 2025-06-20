<?php

namespace App\Livewire\Table;

use Livewire\Component;
use App\Models\Item\Obat;

class DrugDeletedTable extends Component
{
    protected $listeners = ['daftarObatUpdated' => '$refresh'];

    public function restoreDrug(int $id) {
        $obat = Obat::withTrashed()->find($id);
        $obat->restore();
        $this->dispatch('daftarObatUpdated');
    }

    public function render()
    {
        $obats = Obat::onlyTrashed()->get();
        return view('livewire.table.drug-deleted-table', compact('obats'));
    }
}
