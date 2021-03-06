<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;

    public $username = '';
    public $about = '';
    public $birthday = null;
    public $newAvatar;
    public $newAvatars = [];
    public $files = [];

    protected $rules = [
        'username'  => 'max:24',
        'about'     => 'max:140',
        'birthday'  => 'sometimes|nullable|date_format:m/d/Y',
        'files.*'   => 'nullable|image|max:1000'
    ];

    public function render()
    {
        return view('livewire.profile')
            ->layoutData(['header' => 'Profile']);
    }

    public function mount()
    {
        $this->username = auth()->user()->username;
        $this->about    = auth()->user()->about;
        $this->birthday = optional(auth()->user()->birthday)->format('m/d/Y');
    }

    public function save()
    {
        $this->validate();

        $data = [
            'username'  => $this->username,
            'about'     => $this->about,
            'birthday'  => $this->birthday,
        ];

        if (isset($this->files[0])) {
            $filename = $this->files[0]->store('/', 'avatars');
            $data['avatar'] = $filename;
        }

        auth()->user()->update($data);

        $this->dispatchBrowserEvent('notify', 'Profile Saved!');

//        $this->emit('notify-saved');  // Emit globally
        $this->emitSelf('notify-saved');  // Emit only to self
    }
}
