<?php

namespace App\Livewire\Form;

use App\Models\Category\Poli;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ProfileInformationEditForm extends Component
{
    public $userId;
    public $nama;
    public $email;
    public $role;
    public $id_poli;

    public function mount()
    {
        $auth = Auth::user();

        if ($auth->role === 'dokter') {
            $this->nama = $auth->nama;
            $this->email = $auth->email;
            $this->role = $auth->role;
            $this->id_poli = $auth->id_poli;
        } else {
            $this->nama = $auth->nama;
            $this->email = $auth->email;
        }
    }

    public function update()
    {
        try {
            if ($this->role === 'dokter') {
                User::where('id', $this->userId)
                    ->update([
                        'nama' => $this->nama,
                        'email' => $this->email,
                        'id_poli' => $this->id_poli
                    ]);
            } else {
                User::where('id', $this->userId)
                    ->update([
                        'nama' => $this->nama,
                        'email' => $this->email,
                    ]);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function render()
    {
        $polis = Poli::all();
        return view('livewire.form.profile-information-edit-form', compact('polis'));
    }
}
