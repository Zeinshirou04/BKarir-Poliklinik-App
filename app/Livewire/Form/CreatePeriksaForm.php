<?php

namespace App\Livewire\Form;

use App\Models\User;
use Livewire\Component;
use App\Models\Checkup\Periksa;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\Checkup\JadwalPeriksa;
use App\Models\Checkup\JanjiPeriksa;

class CreatePeriksaForm extends Component
{
    public $nama;
    public $no_rm;
    public $dokter_id;
    public $jadwal_id;
    public $jadwals;
    public $keluhan;

    public function getUserId()
    {
        return Auth::user()->getAuthIdentifier();
    }

    public function store()
    {
        try {
            $countJanjiPeriksa = JanjiPeriksa::where('id_jadwal', $this->jadwal_id)->count();
            JanjiPeriksa::create([
                'id_pasien' => $this->getUserId(),
                'id_jadwal' => $this->jadwal_id,
                'keluhan' => $this->keluhan,
                'no_antrian' => $countJanjiPeriksa + 1
            ]);
            $this->dispatch('daftarPeriksaUpdated');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function mount()
    {
        $user = Auth::user();
        $this->nama = $user->nama;
        $this->no_rm = $user->no_rm;
    }

    public function hydrate()
    {
        Log::info("Hydrating...");
    }

    public function updatedDokterId($value)
    {
        Log::info("DOCTOR ID CHANGED TO: $value");
        $this->jadwals = JadwalPeriksa::where('id_dokter', $value)->get();
    }

    public function render()
    {
        Log::info("Rendering...");
        $doctors = User::where('role', 2)->with('jadwalPeriksa')->get();
        // dd($doctors);
        return view('livewire.form.create-periksa-form', compact('doctors'));
    }
}
