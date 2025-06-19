<?php

namespace App\Livewire\Table;

use App\Models\Checkup\JadwalPeriksa;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DoctorScheduleTable extends Component
{
    protected $listeners = ['daftarJadwalUpdated' => '$refresh'];

    public function emitActivate(int $id)
    {
        $jadwal = JadwalPeriksa::findOrFail($id);
        $jadwal->status = 1;
        $jadwal->save();
        $this->dispatch('daftarPeriksaUpdated');
    }

    public function emitDeactivate(int $id)
    {
        $jadwal = JadwalPeriksa::findOrFail($id);
        $jadwal->status = 0;
        $jadwal->save();
        $this->dispatch('daftarPeriksaUpdated');
    }

    public function render()
    {
        $dokterId = Auth::user()->getAuthIdentifier();
        $jadwals = JadwalPeriksa::where('id_dokter', $dokterId)->get();
        return view('livewire.table.doctor-schedule-table', compact('jadwals'));
    }
}
