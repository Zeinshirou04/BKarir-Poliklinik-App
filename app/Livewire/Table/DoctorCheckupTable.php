<?php

namespace App\Livewire\Table;

use App\Models\Checkup\DetailPeriksa;
use App\Models\Checkup\JadwalPeriksa;
use App\Models\Checkup\JanjiPeriksa;
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

    public function destroy(int $id)
    {
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
        $janjiPeriksas = JanjiPeriksa::with(['jadwalPeriksa', 'pasien', 'periksa'])
            ->whereHas('jadwalPeriksa', function ($query) use ($userId) {
                $query->where('id_dokter', $userId);
            })
            ->get();
        // $jadwals = JadwalPeriksa::where('id_dokter', $userId)
        //     ->where('status', true)
        //     ->with(['janjiPeriksa', 'pasien.periksa'])
        //     ->get()
        //     ->filter(function ($jadwal) {
        //         return !$jadwal->janjiPeriksa->isEmpty();
        //     });
        // dd($janjiPeriksas);
        return view('livewire.table.doctor-checkup-table', compact('janjiPeriksas'));
    }
}
