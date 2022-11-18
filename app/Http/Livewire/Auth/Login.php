<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email, $password;
    public $user;
    public $saveSuccess = false, $failed = false;

    protected $rules  = [
        'email' => 'required|email',
        'password' => 'required'
    ];


    public function login ()
    {
        $this->validate();
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            dd(Auth::user());
            return redirect()->route('blog');
        } else {
            $this->failed = true;
        }
    }

    public function render()
    {
        return view('livewire.auth.login')->extends('layout');
    }
}
