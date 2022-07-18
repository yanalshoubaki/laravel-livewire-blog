<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Livewire\Component;
use Livewire\WithFileUploads;

class Register extends Component
{
    use WithFileUploads;
    public $name, $email, $password, $avatar, $username;
    public $user;
    public $currentStep = 1;
    public $saveSuccess = false, $failed = false;
    public function mount()
    {
        $this->user = new User;
    }
    public function registerStep1(): void
    {
        $this->validate(
            [
                'name' => 'required',
                'email' => 'required|unique:users|email',
                'password' => 'required',
                'username' => 'required|unique:users',
            ]
        );


        $this->currentStep = 2;
    }

    public function registerStep2()
    {
        $this->validate(
            [
                'avatar' => 'required|image|max:2048'
            ],
        );
        $imageName = random_int(500, 999) * time() . '.' . $this->avatar->extension();
        $filePath = Storage::disk('public')->putFileAs('images', $this->avatar, $imageName);
        $user = $this->user->create([
            'name' => $this->name,
            'email' => $this->email,
            'username' => $this->username,
            'password' => Hash::make($this->password),
            'avatar' => URL::to('/') . '/storage/' . $filePath
        ]);

        $this->user = $user;
        $this->currentStep = 3;
    }

    public function render()
    {
        return view('livewire.auth.register')->extends('layout');
    }
}
