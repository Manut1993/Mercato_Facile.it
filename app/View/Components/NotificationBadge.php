<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class NotificationBadge extends Component
{
    public $notificationCount;

    public function __construct()
    {
        $this->notificationCount=Auth::user()->unreadNotifications->count() ?? 0;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.notification-badge',['notificationCount'=>$this->notificationCount]);
    }
}
