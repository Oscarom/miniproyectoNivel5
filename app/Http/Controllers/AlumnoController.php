<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return view("alumnos/index");
    }

    public function create()
    {
        return view("alumnos/create");
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
        Alumno::create([
            "dni" => $request->dni,
            "name" => $request->nombre,
            "email" => $request->email,
            "direccion" => $request->direccion,
        ]);

        return redirect()->route("alumno.index")->with("status", "usuario creado con exito");;
    }
    public function edit(string $id)
    {
        $alumno = Alumno::find($id);
       /* es lo mismo que lo de arriba $usuario = DB::table("users")->where("id", $id)->first(); */
    

        return view("alumnos/edit", compact("alumno"));
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
        

        $alumno = Alumno::find($id);
        $alumno->dni = $request->dni;
        $alumno->name = $request->nombre;
        $alumno->email = $request->email;
        $alumno->direccion = $request->direccion;
        $alumno->save();
          

        return redirect()->route("alumno.index")->with("status", "datos actualizados con exito");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {   $alumno = Alumno::find($id);
        $alumno->delete();
        return redirect()->route("alumno.index")->with("status", "datos eliminados con exito");
    }

   
}