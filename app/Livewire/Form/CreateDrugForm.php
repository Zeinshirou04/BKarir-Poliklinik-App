<?php

namespace App\Livewire\Form;

use Livewire\Attributes\On;

use App\Models\Item\Obat;
use Livewire\Component;

class CreateDrugForm extends Component
{

    public $nama_obat;
    public $jenis_kemasan;
    public $harga;
    public $mode = 'add';

    public function store()
    {
        try {
            $exist = Obat::where('nama_obat', $this->nama_obat)->where('harga', $this->harga)->get();
            if ($exist && $this->mode === 'add') {
                $this->addError('error', 'Obat sudah terdaftar, silahkan daftarkan obat lain!');
                return back()->withInput();
            }
            Obat::updateOrCreate([
                'nama_obat' => $this->nama_obat,
            ], [
                'kemasan' => $this->jenis_kemasan,
                'harga' => $this->harga
            ]);
            $this->mode = 'add';
            $this->nama_obat = null;
            $this->jenis_kemasan = null;
            $this->harga = null;
            $this->dispatch('daftarObatUpdated');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    #[On('editDrugData')]
    public function edit(int $id)
    {
        $obat = Obat::find($id);
        $this->nama_obat = $obat->nama_obat;
        $this->jenis_kemasan = $obat->kemasan;
        $this->harga = $obat->harga;
        $this->mode = 'edit';
        $this->dispatch('daftarObatUpdated');
    }

    #[On('cancelEditDrugData')]
    public function clear(int $id)
    {
        $obat = Obat::find($id);
        $this->nama_obat = null;
        $this->jenis_kemasan = null;
        $this->harga = null;
        $this->mode = 'edit';
        $this->dispatch('daftarObatUpdated');
    }

    #[On('deleteDrugData')]
    public function destroy(int $id)
    {
        try {
            Obat::destroy($id);
            $this->dispatch('daftarObatUpdated');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function render()
    {
        return view('livewire.form.create-drug-form');
    }
}
