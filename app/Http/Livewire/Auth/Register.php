<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;

class Register extends Component
{
    public $email = '';
    public $password = '';
    public $passwordConfirmation = '';

    public function register()
    {
        User::create([
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);

    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
