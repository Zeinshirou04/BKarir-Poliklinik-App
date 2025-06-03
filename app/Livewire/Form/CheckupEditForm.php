<?php

namespace App\Livewire\Form;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use App\Models\Item\Obat;
use App\Models\Checkup\Periksa;
use App\Models\Checkup\DetailPeriksa;

class CheckupEditForm extends Component
{
    public $checkupId;
    public $nama_pasien;
    public $tgl_periksa;
    public $id_obat;
    public $catatan;
    public $biaya_periksa;

    public function update() {
        try {
            $id_pasien = Periksa::find($this->checkupId)->id_pasien;
            $pasien = User::find($id_pasien);
            $pasien->nama = $this->nama_pasien;
            $pasien->save();

            $periksa = Periksa::find($this->checkupId);
            $periksa->tgl_periksa = $this->tgl_periksa;
            $periksa->catatan = $this->catatan;
            $periksa->biaya_periksa = $this->biaya_periksa;
            $periksa->save();

            $detail = DetailPeriksa::find($this->checkupId);
            $detail->id_obat = $this->id_obat;
            $detail->save();
            $this->dispatch('daftarPeriksaUpdated');
            $this->dispatch('showCheckupDetails', id: $this->checkupId);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function render()
    {
        $obats = Obat::all();
        $details = DetailPeriksa::where('id_periksa', $this->checkupId)->with(['periksa.pasien', 'obat'])->first();
        $this->nama_pasien = $details->periksa->pasien->nama;
        $this->tgl_periksa = Carbon::parse($details->periksa->tgl_periksa)->format('Y-m-d');
        $this->id_obat = $details->id_obat;
        $this->catatan = $details->periksa->catatan;
        $this->biaya_periksa = $details->periksa->biaya_periksa;
        return view('livewire.form.checkup-edit-form', compact('details', 'obats'));
    }
}
