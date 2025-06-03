<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests\Auth\RegisterRequest;
use Exception;
use Illuminate\Database\QueryException;

class RegisterForm extends Component
{

    public $nik;
    public $fullname;
    public $email;
    public $password;
    public $password_confirmation;
    public $alamat;
    public $no_hp;
    public $message;

    public function rules()
    {
        return (new RegisterRequest())->rules();
    }

    public function store()
    {
        $this->validate();

        if ($this->password !== $this->password_confirmation) {
            $this->addError('password_confirmation', 'Password confirmation does not match.');
            return back()->withInput();
        }

        try {
            $currentYearMonth = date('Ym');
            $patientCount = User::where('no_rm', 'like', $currentYearMonth . '-%')->count();
            $no_rm = $currentYearMonth . '-' . str_pad($patientCount + 1, 3, '0', STR_PAD_LEFT);

            $user = User::create([
                'nama' => $this->fullname,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'alamat' => $this->alamat,
                'no_hp' => $this->no_hp,
                'no_ktp' => $this->nik,
                'no_rm' => $no_rm,
                'role' => '1'
            ]);

            Auth::login($user);

            return redirect()->route('dashboard.patient.overview');
        } catch (QueryException $e) {
            if ($e->getCode() == 23000) {
                $this->addError('email', 'Email already taken, please use another email.');
                return back()->withInput();
            }

            $this->addError('error', "Something went wrong, please try again. (" . $e->getCode() . ") {$e->getMessage()}");
            return back()->withInput();
        } catch (Exception $e) {
            $this->addError('error', "Something went wrong, please try again. (" . $e->getCode() . ") {$e->getMessage()}");
            return back()->withInput();
        }
    }

    public function render()
    {
        return view('livewire.auth.register-form');
    }
}
