<?php

namespace App\Livewire\Form;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use App\Models\Item\Obat;
use App\Models\Checkup\Periksa;
use App\Models\Checkup\DetailPeriksa;
use App\Models\Checkup\JanjiPeriksa;

class CheckupEditForm extends Component
{
    public $janjiId;
    public $nama_pasien;
    public $tgl_periksa;
    public $id_obats;
    public $catatan;
    public $base_biaya_periksa = 150000;
    public $biaya_periksa;

    public function update()
    {
        try {
            $this->biaya_periksa = $this->base_biaya_periksa;
            if (!is_null($this->id_obats)) {
                $obats = Obat::whereIn('id', $this->id_obats)->get();
                $this->biaya_periksa += $obats->sum('harga');
            }

            $periksa = Periksa::updateOrCreate(
                ['id_janji_periksa' => $this->janjiId],
                [
                    'id_janji_periksa' => $this->janjiId,
                    'tgl_periksa' => $this->tgl_periksa,
                    'catatan' => $this->catatan,
                    'biaya_periksa' => $this->biaya_periksa
                ]
            );

            if (!is_null($this->id_obats)) {
                DetailPeriksa::where('id_periksa', $periksa->id)->delete();

                foreach ($this->id_obats as $key => $value) {
                    DetailPeriksa::create(
                        [
                            'id_periksa' => $periksa->id,
                            'id_obat' => $value,
                        ]
                    );
                }
            }

            $this->dispatch('daftarPeriksaUpdated');
            $this->dispatch('showCheckupDetails', id: $periksa->id);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function render()
    {
        $obats = Obat::all();
        $janji = JanjiPeriksa::where('id', $this->janjiId)->with('pasien.periksa')->first();
        $periksa = $janji->pasien->periksa->where('id_janji_periksa', $this->janjiId)->first();

        try {
            $detailPeriksa = DetailPeriksa::where('id_periksa', $periksa->id)->with('obat')->get();
            $this->id_obats = $detailPeriksa->pluck('obat.id');
        } catch (\Throwable $th) {
            throw $th;
        }

        $this->nama_pasien = $janji->pasien->nama;
        $this->biaya_periksa = $this->base_biaya_periksa;
        if (!is_null($periksa)) {
            $this->tgl_periksa = Carbon::parse($periksa->tgl_periksa)->format('Y-m-d');
            $this->catatan = $periksa->catatan;
            $this->biaya_periksa = $periksa->biaya_periksa;
        }
        return view('livewire.form.checkup-edit-form', compact('janji', 'obats'));
    }
}
