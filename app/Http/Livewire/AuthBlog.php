<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class AuthBlog extends Component
{

    public $name, $email, $password;
    public $user;
    public $saveSuccess = false;

    public function mount ()
    {
        $this->user = new User;
    }

    public function login ()
    {

        $this->validate(['email' => 'required|email', 'password' => 'required'], ['email.required' => 'Email field is required.', 'password.required' => 'Password is required',]);

        $userdata = ['email' => $this->email, 'password' => $this->password];
        if (Auth::attempt($userdata)) {
            request()->session()->regenerate();
            $user = User::where('email', $this->email)->first();
            Auth::login($user, true);
            return redirect()->intended('blog');
        } else {
        return back()->with('message', 'Incorrect email or password');
        }
    }

    public function register ()
    {
        $this->validate(['name' => 'required|min:12', 'email' => 'required|email', 'password' => 'required'], ['email.required' => 'Email field is required.', 'password.required' => 'Password is required',]);

        $user = $this->user->create(['name' => $this->name, 'email' => $this->email, 'password' => Hash::make($this->password)]);

        $this->saveSuccess = true;
        return redirect()->route('login');

    }

    public function render ()
    {
        return view('livewire.auth-blog')->extends('layout');
    }
}
