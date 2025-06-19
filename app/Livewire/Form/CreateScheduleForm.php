<?php

namespace App\Livewire\Form;

use App\Days;
use App\Models\Checkup\JadwalPeriksa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;

class CreateScheduleForm extends Component
{
    public int $id_dokter;
    public string $hari;
    public string $jam_mulai;
    public string $jam_selesai;
    public int $status = 0;
    public $message;

    public function store()
    {
        $this->id_dokter = Auth::user()->getAuthIdentifier();
        $validated = $this->validate([
            'id_dokter' => ['required'],
            'hari' => ['required', Rule::enum(Days::class)],
            'jam_mulai' => ['required', 'date_format:H:i'],
            'jam_selesai' => ['required', 'date_format:H:i'],
            'status' => ['required', 'in:0,1']
        ]);

        $exist = JadwalPeriksa::where('id_dokter', $this->id_dokter)
                ->where('hari', $this->hari)
                ->where('jam_mulai', $this->jam_mulai)
                ->where('jam_selesai', $this->jam_selesai)->get();

        if (count($exist) > 0) {
            $this->addError('error', 'Jadwal sudah terdaftar, silahkan buat jadwal lain!');
            return back()->withInput();
        }

        JadwalPeriksa::create($validated);
        $this->dispatch('daftarJadwalUpdated');
    }

    public function render()
    {
        return view('livewire.form.create-schedule-form');
    }
}
