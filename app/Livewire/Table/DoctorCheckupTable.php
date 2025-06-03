<?php

namespace App\Livewire\Table;

use App\Models\Checkup\DetailPeriksa;
use Livewire\Component;
use App\Models\Checkup\Periksa;
use Illuminate\Support\Facades\Auth;

class DoctorCheckupTable extends Component
{
    protected $listeners = ['daftarPeriksaUpdated' => '$refresh'];

    public function emitDetailCheck(int $id)
    {
        $this->dispatch('showCheckupDetails', id: $id);
    }

    public function emitDetailEdit(int $id)
    {
        $this->dispatch('showEditForm', id: $id);
    }

    public function destroy(int $id) {
        try {
            DetailPeriksa::destroy($id);
            Periksa::destroy($id);
            $this->dispatch('daftarPeriksaUpdated');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function render()
    {
        $userId = Auth::user()->getAuthIdentifier();
        $periksas = Periksa::where('id_dokter', $userId)->with('pasien')->get();
        return view('livewire.table.doctor-checkup-table', compact('periksas'));
    }
}
