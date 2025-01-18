<?php

namespace App\Livewire;

use Livewire\Component;

class CardAdmin extends Component
{
    public $detail;
    public $filter;
    public $index; 
    public function render()
    {
        return view('livewire.card-admin');
    }
}
