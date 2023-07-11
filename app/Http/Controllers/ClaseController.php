<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Clase;
use App\Models\Maestro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClaseController extends Controller
{
    public function index()
    {
        
        return view("clases/index");
    }

    public function create()
    {
    
        $maestros =Maestro::all();
        return view("clases/create", compact("maestros") );
    }

    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(),[
           "nombre" => ["required"],
           "maestro_id" => ["required"],
        ]);

        if ($validator->fails()) {
            return back()->with("status", "Datos incorrectos");
        }
        Clase::create([
            "name" => $request->nombre,
            "maestro_id" => $request->maestro_id,
        ]);

        return redirect()->route("clase.index")->with("status", "usuario creado con exito");;
    }
    public function edit(string $id)
    {
        $clase = Clase::find($id);
        $maestros =Maestro::all();
       /* es lo mismo que lo de arriba $usuario = DB::table("users")->where("id", $id)->first(); */
    

        return view("clases/edit", compact("clase", "maestros"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "nombre" => ['required'],       
        ]);
        

        $clase = Clase::find($id);
        $clase->name = $request->nombre;
        $clase->maestro_id = $request->maestro_id;
        $clase->save();
          

        return redirect()->route("clase.index")->with("status", "datos actualizados con exito");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {   $clase = Clase::find($id);
        $clase->delete();
        return redirect()->route("clase.index")->with("status", "datos eliminados con exito");
    }

}
