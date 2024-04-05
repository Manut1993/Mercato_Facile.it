<?php

namespace App\Livewire\Dashboard;

use App\Models\User;
use App\Notifications\RevisorFeedback;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.dashboard-layout')] 
class Notifications extends Component
{
    public $userNotifications;
    public $message;
    public $showMessage=false;

    public function mount(){
        foreach(Auth::user()->notifications as $notification){
            $this->userNotifications[]=$notification->data;
        };
    }

    public function acceptRevisor($key){
        $userToBeAccepted=User::find($this->userNotifications[$key]['id']);
        if($userToBeAccepted->is_revisor == 1){
            $this->setMessage('utente già revisore');
            return;
        }
        else{
            $userToBeAccepted->is_revisor=true;
            $userToBeAccepted->save();
            $this->setMessage('utente accettato come revisore');
            $userToBeAccepted->notify(new RevisorFeedback('sei stato accettato come revisore','revisor_confirmation'));
        }
    }

    public function denyRevisor($key){
        $userToBeDenied=User::find($this->userNotifications[$key]['id']);
        if($userToBeDenied->is_revisor == 0){
            $this->setMessage('utente già senza privilegi da amministratore');
            return;
        }else{
            $this->setMessage('utente rifiutato');
        }
    }

    public function markAsReadNotifications(){
        Auth::user()->unreadNotifications->markAsRead();
        $this->redirect(route('dashboard.notifications'));
    }

    public function setMessage(String $message):void{
        $this->message=$message;
        $this->showMessage=!$this->showMessage;
    }


    public function render()
    {   
        return view('livewire.dashboard.notifications');
    }
}
