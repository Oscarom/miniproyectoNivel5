<?php

namespace App\Http\Livewire;

use App\Http\Controllers\AlumnoController;
use App\Models\Alumno;
use App\Models\User;
use Livewire\Component;

class ShowAlumnos extends Component
{
    public $search;
    public function render()
    {
        $alumnos = Alumno::where("name", "LIKE", "%" . $this->search . "%" )
        ->orWhere("email", "LIKE", "%" . $this->search . "%")->get();

        return view('livewire.show-alumnos',["alumnos" => $alumnos]);
    }
}
