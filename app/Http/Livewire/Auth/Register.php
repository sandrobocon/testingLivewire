<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;

class Register extends Component
{
    public $name = '';
    public $email = '';
    public $password = '';
    public $passwordConfirmation = '';

    protected $rules = [
        'name' => ['required', 'string', 'between:3,100'],
        'email' => ['required', 'email', 'unique:users'],
        'password' => ['required', 'min:6', 'same:passwordConfirmation'],
    ];

    public function updatedEmail()
    {
        $this->validate(['email'=>['unique:users']]);
    }

    public function register()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);

        auth()->login($user);

        return redirect('/');
    }

    public function render()
    {
        return view('livewire.auth.register')
            ->layout('layouts.guest');
    }
}
