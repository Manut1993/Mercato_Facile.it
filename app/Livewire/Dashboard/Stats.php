<?php

namespace App\Livewire\Dashboard;

use App\Models\Category;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.dashboard-layout')] 
class Stats extends Component
{   
    public $data;

    public function mount() : void {
        // $query=Category::all();
        $userId = Auth::id();
        $categories = Category::with(['products' => function ($query) use ($userId) {
            $query->whereHas('user', function ($query) use ($userId) {
                $query->where('id', $userId);
            });
        }])->get();
  
        foreach($categories as $value){
            $this->data[]=[$value->title,$value->products()->count()];
        }
    }

    public function render()
    {   
        return view('livewire.dashboard.stats');
    }
}
