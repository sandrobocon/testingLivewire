<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Profile extends Component
{
    public $username = '';
    public $about = '';
    public $count = 0;

    public function render()
    {
        return view('livewire.profile');
    }

    public function mount()
    {
        $this->username = auth()->user()->username;
        $this->about    = auth()->user()->about;
    }


    public function save()
    {
        $profileData = $this->validate([
            'username' => 'max:24',
            'about'    => 'max:140',
        ]);

        auth()->user()->update($profileData);

        $this->dispatchBrowserEvent('notify', 'Profile Saved!');

//        $this->emit('notify-saved');  // Emit globally
        $this->emitSelf('notify-saved');  // Emit only to self
    }
}
