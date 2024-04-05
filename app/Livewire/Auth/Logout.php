<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Logout extends Component
{

    public function logout(){
        Auth::logout();
        $this->redirectRoute('homepage');
    }

    public function render()
    {
        return view('livewire.auth.logout');
    }
}
