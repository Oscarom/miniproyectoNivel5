<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return view("usuarios/index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles =Role::all();
    
        return view("usuarios/create", compact("roles"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(),[
           "nombre" => ["required"],
           "email" => ["required","email"],
           "pass" => ["required"],
           "rol" => ["required"]
        ]);

        if ($validator->fails()) {
            return back()->with("status", "Datos incorrectos");
        }
        User::create([
            "name" => $request->nombre,
            "email" => $request->email,
            "password" => Hash::make($request->pass)
        ])->assignRole($request->rol);

        return redirect()->route("user.index")->with("status", "usuario creado con exito");;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $usuario = User::find($id);
       /* es lo mismo que lo de arriba $usuario = DB::table("users")->where("id", $id)->first(); */

        $roles =Role::all();
    

        return view("usuarios/edit", compact("usuario","roles"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "nombre" => ['required'],
            "email" => ['required']        
        ]);
        //leer el rol que estoy recibiendo del usuario
        $newRol = $request->rol;
        //Traer todos los roles existentes
        $rolesDB  = Role::all();
        $rolesNames = [];
        //Guardo todos los roles en un arreglo
        foreach ($rolesDB as $rolDB) {
            $rolesNames[]=$rolDB->name;
        }

        //compruebo que el rol que recibo del usuario, exista en los roles existentes
        $rolExist = in_array($newRol, $rolesNames, true);

        $usuario = User::find($id);
        $usuario->name = $request->nombre;
        $usuario->email = $request->email;
        $usuario->save();
        

        if ($rolExist) {
            foreach ($rolesNames as $rol) {
                $usuario->removeRole($rol);
            }
            $usuario->assignRole($newRol);
        } else {
            return redirect()->route("user.index")->with("status", "rol no existe");;

        }        

        return redirect()->route("user.index")->with("status", "datos actualizados con exito");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {   $usuario = User::find($id);
        $usuario->delete();
        return redirect()->route("user.index")->with("status", "datos eliminados con exito");
    }
}