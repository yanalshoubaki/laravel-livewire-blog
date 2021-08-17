<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class Register extends Component
{
    use WithFileUploads;
    public $first_name, $last_name, $user_email, $password,  $photo, $username;
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
            'first_name' => 'required',
            'last_name' => 'required',
            'user_email' => 'required|unique:tbl_users|email',
            'password' => 'required',
            'username' => 'required|unique:tbl_users'
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
                'photo' => 'required',

            ],

        );
       $image =         $this->photo->store('public/users');
        $user = $this->user->create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'user_email' => $this->user_email,
            'username' => $this->username,
            'password' => Hash::make($this->password)
        ]);

        $user->metaRelation()->createMany([
            [
                'user_id' => $user->user_id,
                'meta_key'=> 'user_picture',
                'meta_value' => env('APP_URL') . '/' . $image
            ],
        ]);
        $this->user = $user;
        $this->currentStep = 3;

    }

    public function render()
    {
        return view('livewire.auth.register')->extends('layout');
    }
}
