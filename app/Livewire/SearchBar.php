<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class SearchBar extends Component
{
    public $userInput='';

    public function search(){
        dump('richiesta ok');
    }

    public function render()
    {
        $searchResult='';
        if($this->userInput!=''){
            $searchResult=Product::search($this->userInput)->where('is_accepted',true)->take(5)->get();
        }
        return view('livewire.search-bar',compact('searchResult'));
    }
}
