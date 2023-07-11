<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class ShowUsers extends Component
{
    public $search;
    public function render()
    {   
         $usuarios = User::where("name", "LIKE", "%" . $this->search . "%" )
        ->orWhere("email", "LIKE", "%" . $this->search . "%")->get();

        return view('livewire.show-users',["usuarios" => $usuarios]);
        /* return view('livewire.show-users', ["usuarios" => $this->search]);  */
        /* $usuarios = User::all();

        return view('livewire.show-users',["usuarios" => $usuarios]); */

    }
}
