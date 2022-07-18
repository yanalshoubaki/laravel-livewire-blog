<?php

namespace App\Http\Livewire\Pages\Settings;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class Profile extends Component
{
    use WithFileUploads;
    public $user, $avatar;

    protected $rules = [
        'user.name' => 'required',
        'user.email' => 'required|email',
        'user.username' => 'required',
        'avatar' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
        'user.bio' => 'sometimes'
    ];


    public function mount()
    {
        $this->user = auth()->user();
        $this->photo = $this->user->photo;
    }

    public function updateProfile()
    {
        $this->validate();
        if (!is_string($this->avatar)) {
            $imageName = random_int(500, 999) * time() . '.' . $this->avatar->extension();
            $filePath = Storage::disk('public')->putFileAs('images', $this->avatar, $imageName);
            $image = URL::to('/') . '/storage/' . $filePath;
        } else {
            $image = $this->avatar;
        }

        $this->user->name = $this->user->name;
        $this->user->bio = $this->user->bio;
        $this->user->user_email = $this->user->email;
        $this->user->username = $this->user->username;
        $this->user->avatar = $image;
        $this->user->save();
    }

    public function render()
    {
        return view('livewire.pages.settings.profile')->extends('livewire.settings')->section('settings');
    }
}
