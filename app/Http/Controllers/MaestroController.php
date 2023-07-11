<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Maestro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class MaestroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return view("maestros/index");
    }

    public function create()
    {
        return view("maestros/create");
    }

    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(),[
           "dni" => ["required"],
           "nombre" => ["required"],
           "email" => ["required","email"],
           "direccion" => ["required"]
        ]);

        if ($validator->fails()) {
            return back()->with("status", "Datos incorrectos");
        }
        Maestro::create([
            "dni" => $request->dni,
            "name" => $request->nombre,
            "email" => $request->email,
            "direccion" => $request->direccion,
        ]);

        return redirect()->route("maestro.index")->with("status", "maestro creado con exito");;
    }
    public function edit(string $id)
    {
        $maestro = Maestro::find($id);
       /* es lo mismo que lo de arriba $usuario = DB::table("users")->where("id", $id)->first(); */
    

        return view("maestros/edit", compact("maestro"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "nombre" => ['required'],
            "email" => ['required'],         
        ]);
        

        $maestro = Maestro::find($id);
        $maestro->dni = $request->dni;
        $maestro->name = $request->nombre;
        $maestro->email = $request->email;
        $maestro->direccion = $request->direccion;
        $maestro->save();
          

        return redirect()->route("maestro.index")->with("status", "datos actualizados con exito");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {   $maestro = Maestro::find($id);
        $maestro->delete();
        return redirect()->route("maestro.index")->with("status", "datos eliminados con exito");
    }

   
}