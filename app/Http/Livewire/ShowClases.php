<?php

namespace App\Http\Livewire;

use App\Models\Clase;
use Livewire\Component;

class ShowClases extends Component
{
    public $search;
    public function render()
    {
        $clases = Clase::where("name", "LIKE", "%" . $this->search . "%" )
        ->orWhere("maestro_id", "LIKE", "%" . $this->search . "%")->get();

        return view('livewire.show-clases',["clases" => $clases]);
    }
}
