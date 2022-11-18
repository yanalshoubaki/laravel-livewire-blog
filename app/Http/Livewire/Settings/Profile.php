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
        'user.email' => 'required|email',
        'user.username' => 'required',
        'photo' => 'nullable|image|max:2048',
        'user.bio' => 'sometimes'
    ];


    public function mount() {
        $this->user = auth()->user();
    }

    public function updateProfile() {
        $this->validate();
        if ($this->photo != null) {
            $imageName = time() . '.' . $this->photo->extension();
            $filePath = Storage::disk('public')->putFileAs('/', $this->photo, $imageName);
            $this->user->photo = $imageName;

        }
        $this->user->save();
    }

    public function render()
    {
        return view('livewire.settings.profile')->extends('livewire.settings')->section('settings');
    }
}
