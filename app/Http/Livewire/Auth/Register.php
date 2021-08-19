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
    public $name, $user_email, $password, $photo, $username;
    public $user;
    public $currentStep = 1;
    public $saveSuccess = false, $failed = false;
    public function mount ()
    {
        $this->user = new User;
    }
    public function registerStep1 (): void
    {
        $this->validate(
        [
            'name' => 'required',
            'user_email' => 'required|unique:tbl_users|email',
            'password' => 'required',
            'username' => 'required|unique:tbl_users',
        ],
        [
            'user_email.required' => 'Email field is required.',
            'password.required' => 'Password is required',
        ]
        );


        $this->currentStep = 2;

    }

    public function registerStep2() {
        $this->validate(
            [
                'photo' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048'
            ],
        );
        $imageName = random_int(500, 999) * time() . '.' . $this->photo->extension();
        $filePath = Storage::disk('public')->putFileAs('images', $this->photo, $imageName);
        $user = $this->user->create([
            'name' => $this->name,
            'user_email' => $this->user_email,
            'username' => $this->username,
            'password' => Hash::make($this->password),
            'photo' => URL::to('/') . '/storage/' . $filePath
        ]);

        $this->user = $user;
        $this->currentStep = 3;

    }

    public function render()
    {
        return view('livewire.auth.register')->extends('layout');
    }
}
