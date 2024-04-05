<?php

namespace App\Livewire;

use Livewire\Component;

class RevisorProduct extends Component
{
    public $product;
    public $images;

    public function mount($product, $images){
        $this->product=$product;
        $this->images = $images;
    }

    public function render()
    {
        return view('livewire.revisor-product');
    }
}
