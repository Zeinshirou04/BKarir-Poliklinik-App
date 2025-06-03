<?php

namespace App\Livewire\Form;

use App\Models\User;
use Livewire\Component;
use App\Models\Checkup\Periksa;
use Illuminate\Support\Facades\Auth;

class CreatePeriksaForm extends Component
{

    public $nama;
    public $dokter;

    public function getUserId()
    {
        return Auth::user()->getAuthIdentifier();
    }

    public function store()
    {
        try {
            $periksa = Periksa::create([
                'id_pasien' => $this->getUserId(),
                'id_dokter' => $this->dokter,
                'tgl_periksa' => null,
                'catatan' => null,
                'biaya_periksa' => null
            ]);
            $periksa->detailPeriksa()->create([
                'id_obat' => null
            ]);
            $this->dispatch('daftarPeriksaUpdated');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function mount() {
        $this->dokter = '0';
        $user = Auth::user();
        $this->nama = $user->nama;
    }

    public function render()
    {
        $doctors = User::where('role', 2)->get();
        return view('livewire.form.create-periksa-form', compact('doctors'));
    }
}
