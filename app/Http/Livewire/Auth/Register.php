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
        $data = $this->validate([
            'email' => ['required','email','unique:users'],
            'password' => ['required','min:6','same:passwordConfirmation'],
        ]);


        $user = User::create([
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        auth()->login($user);

        return redirect('/');
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
