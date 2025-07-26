<?php

// 1. Livewire Component: app/Livewire/Login.php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $username;
    public $password;

    public function login()
    {
        $this->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ], [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
        ]);

        if (Auth::attempt(['username' => $this->username, 'password' => $this->password])) {
            session()->regenerate();
            session()->flash('message', 'Selamat Datang ' . Auth::user()->nama . '!');
            return redirect()->to('/admin-page');
        }

        session()->flash('error', 'Username atau password salah.');
    }

    public function render()
    {
        return view('livewire.login');
    }
}
