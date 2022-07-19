<?php

namespace App\Http\Livewire\Pages\Settings;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Profile extends Component
{
    use WithFileUploads;
    public $user, $avatar;


    /**
     * User social links
     *
     * @var array
     */
    public array $social;

    protected $rules = [
        'user.name' => 'required',
        'user.email' => 'required|email',
        'user.username' => 'required',
        'avatar' => 'nullable|image|max:2048',
        'user.bio' => 'sometimes',
        'social' => 'sometimes|array',
        'social.*' => 'required',
    ];


    public function mount()
    {
        $this->user = auth()->user();
        $this->avatar = $this->user->avatar;
        $this->social = $this->user->social->toArray();
    }

    public function updateProfile()
    {
        dd(count($this->social), $this->errorBag);
        $this->validate();
        if (!is_string($this->avatar) || $this->avatar == '') {
            $imageName = random_int(500, 999) * time() . '.' . $this->avatar->extension();
            $filePath = Storage::disk('public')->putFileAs('/', $this->avatar, $imageName);
            $image = $imageName;
        } else {
            $image = $this->avatar;
        }

        if (count($this->social) > 0) {
            $this->user->social()->delete();
            foreach ($this->social as $key => $value) {
                $this->user->social()->create([
                    'website' => $key,
                    'link' => $value,
                ]);
            }
        }

        $this->user->avatar = $image;
        $this->user->save();
        return redirect()->back()->with('success', 'Profile updated successfully');
    }

    public function render()
    {
        return view('livewire.pages.settings.profile')->extends('livewire.settings')->section('settings');
    }
}
