<?php

namespace App\Http\Livewire\Settings;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;
    public $user, $photo;

    protected $rules = [
        'user.name' => 'required',
        'user.user_email' => 'required|email',
        'user.username' => 'required',
        'photo' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
        'user.bio' => 'sometimes'
    ];


    public function mount() {
        $this->user = auth()->user();
        $this->photo = $this->user->photo;
    }

    public function updateProfile() {
        $this->validate();
        if (!is_string($this->photo)) {
            $imageName = random_int(500, 999) * time() . '.' . $this->photo->extension();
            $filePath = Storage::disk('public')->putFileAs('images', $this->photo, $imageName);
            $image = URL::to('/') . '/storage/' . $filePath;
        } else {
            $image = $this->photo;
        }

        $this->user->name = $this->user->name;
        $this->user->bio = $this->user->bio;
        $this->user->user_email = $this->user->user_email;
        $this->user->username = $this->user->username;
        $this->user->photo = $image;
        $this->user->save();
    }

    public function render()
    {
        return view('livewire.settings.profile')->extends('livewire.settings')->section('settings');
    }
}
