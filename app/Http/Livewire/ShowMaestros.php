<?php

namespace App\Http\Livewire;

use App\Models\Maestro;
use Livewire\Component;

class ShowMaestros extends Component
{
    public $search;
    public function render()
    {
        $maestros = Maestro::where("name", "LIKE", "%" . $this->search . "%" )
        ->orWhere("email", "LIKE", "%" . $this->search . "%")->get();

        return view('livewire.show-maestros',["maestros" => $maestros]);
        
    }
}
