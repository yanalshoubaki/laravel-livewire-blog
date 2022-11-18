<?php

    namespace App\Http\Livewire\Auth;

    use App\Models\User;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Storage;
    use Illuminate\Support\Facades\URL;
    use Livewire\Component;
    use Livewire\WithFileUploads;

    class Register extends Component
    {
        use WithFileUploads;

        public $photo;
        public $user;
        public $currentStep = 1;
        public $saveSuccess = false, $failed = false;
        protected $rules = [
            'user.name'     => 'required',
            'user.email'    => 'required|unique:users,email',
            'user.username' => 'required|unique:users,username',
            'user.password' => 'required',
        ];

        public function mount()
        {
            $this->user = new User();
        }

        public function registerStep1()
        : void
        {
            $this->validate();
            $this->currentStep++;
        }

        public function registerStep2()
        {
            $this->validate([
                'photo'         => 'required|image',
            ]);
            $imageName = random_int(500, 999) * time() . '.' . $this->photo->extension();
            $filePath = Storage::disk('public')->putFileAs('/', $this->photo, $imageName);
            $this->user->photo = $imageName;
            $this->user->save();
            Auth::login($this->user, $this->saveSuccess);
            return redirect()->route('blog');
        }

        public function render()
        {
            return view('livewire.auth.register')->extends('layout');
        }
    }
