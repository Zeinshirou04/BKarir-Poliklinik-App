<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class LoginForm extends Component
{

    public $email;
    public $password;
    public $message;

    public function store()
    {
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            $user = Auth::user();
            if (User::find($user->getAuthIdentifier())->role == 'dokter') return redirect()->route('dashboard.doctor.overview');
            return redirect()->route('dashboard.patient.overview');
        }
    }

    public function render()
    {
        return view('livewire.auth.login-form');
    }
}
