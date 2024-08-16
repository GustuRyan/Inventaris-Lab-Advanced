<?php

namespace App\Livewire;

use Livewire\Component;

class CardTrans extends Component
{
    public $detail;
    public $filter;
    public $materials;
    public $index; 
    public function render()
    {
        return view('livewire.card-trans');
    }
}
