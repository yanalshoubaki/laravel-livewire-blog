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

    public function mount ()
    {
        $this->user = new User;
    }

    public function login ()
    {

        $this->validate(['email' => 'required|email', 'password' => 'required'], ['email.required' => 'Email field is required.', 'password.required' => 'Password is required',]);

        $userdata = ['user_email' => $this->email, 'password' => $this->password];
        if (Auth::attempt($userdata)) {
            request()->session()->regenerate();
            $user = User::where('user_email', $this->email)->first();
            Auth::login($user, true);
            return redirect()->intended('blog');
        } else {
            $this->failed = true;
        }

    }

    public function render()
    {
        return view('livewire.auth.login')->extends('layout');
    }
}
